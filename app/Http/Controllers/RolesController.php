<?php

namespace App\Http\Controllers;

use App\Models\permission_RoleModel;
use App\Models\permissionModel;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RolesController extends Controller
{
        protected $roles;
        protected $Pesrissions;
        protected $RolePermissions;
    public function __construct(){
        $this->roles = new Roles;
        $this->Pesrissions = new permissionModel;
        $this->RolePermissions = new permission_RoleModel;
        
    }
    public function index(){
        $Roles = $this->roles->get();
        return view('Layout.Roles.roles' ,compact('Roles'));
    }
    Public function addRolepage(){
        $permissions = $this->Pesrissions->get();
        return view('Layout.Roles.addrolepage' , compact('permissions'));
    }
    Public function modifyrolepage(Request $request){
        $id = $request->id;

        $permissions = $this->Pesrissions::leftJoin('permission_role', function($join) use ($id) {
            $join->on('permission_role.route_id', '=', 'permission.id')
                ->where('permission_role.role_id', '=', $id);
        })
        ->select('permission.id As id' ,'permission.name', 'permission_role.role_id')
        ->get();

        // dd($request);
        $role_name = $this->roles->find($id);
        // $permissions = $this->Pesrissions->get();
        return view('Layout.Roles.modifyrolepage' , compact('permissions' , 'role_name'));
    }
        public function DeleteRole(Request $request){
        $id = $request->id;
        $role = $this->roles->where('id', $id)->first();
        $role->delete();
        return Redirect()->to('/roles')->with('delete' , 'le Role est supprimer avec succes');
    }
    Public function Add_Role(Request $request)
    {
        
        $data = $request->check;    
        $request->validate([
            'name' => 'required|unique:roles,name',
        ] , 
        [
            'name.unique' => 'Le role deja exist',
            'name.required' => 'Le nom de role est importante',
        ]);

        if(!empty($data)){
                $this->roles->name = $request->name;
                $this->roles->save();
                
                $role = $this->roles->where('name', $request->name)->first();
                $id = $role->id;
        
                foreach ($data as $item) {
                    $this->RolePermissions::create([
                        "route_id" => $item,
                        "role_id" => $id
                    ]);
                }
            }
        else{
            
            return Redirect()->to('/addrolepage')->with('name' , 'Les Permissions est vide!!!!');
    
        }
        return Redirect()->to('/roles');
    }
    public function modifyRole(Request $request)
    {
        $id = $request->id;
        $data = $request->check;
    
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ], [
            'name.unique' => 'Le rôle existe déjà',
            'name.required' => 'Le nom du rôle est important',
        ]);
    
        if (empty($data)) {
            return redirect()->to('/modifyrolepage')->with('name', 'Les permissions sont vides !');
        }
    
        $role = $this->roles->find($id);
        $role->name = $request->name;
        $role->update();
    
        $this->RolePermissions::where('role_id', $id)->delete();
    
        foreach ($data as $item) {
            $this->RolePermissions::create([
                "route_id" => $item,
                "role_id" => $id
            ]);
        }
        return redirect()->to('/roles');
    }
    
}
