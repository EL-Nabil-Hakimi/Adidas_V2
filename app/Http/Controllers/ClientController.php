<?php

namespace App\Http\Controllers;
use App\Models\ClientModel;
use App\Models\Roles;
use App\Models\UtilisateurModel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    protected $client;
    protected $roles;
    public function __construct(){
        $this->client = new UtilisateurModel();
        $this->roles = new Roles;
    
    }
    
    public function index(){
        $clients = $this->client::join('roles', 'roles.id', '=', 'utilisateur_models.role_id')
            ->select('utilisateur_models.*', 'roles.name As role_name')
            ->orderBy('utilisateur_models.id', 'DESC')
            ->get();

        return view('Layout.Client.client')->with('clients' , $clients);
    }
    
    public function AddClientPage(){
        return view('Layout.Client.addclient');
    }
    public function modifyClientPage(Request $request){
        $id = $request->id;
        $client = $this->client::join('roles', 'roles.id', '=', 'utilisateur_models.role_id')
                    ->select('utilisateur_models.*', 'roles.name As role_name')
                    ->where('utilisateur_models.id', '=', $id)
                    ->first();
        $roles = $this->roles::all();

        return view('Layout.Client.modifyclient' ,compact('client'  , 'roles'));;
    }

    
    public function Delete_Client(Request $request){
        $id = $request->id;
        $this->client->find($id)->delete();
        return redirect()->route('ClientView');
    }
    public function Modify_Client(Request $request){
        $id = $request->id;
        $client = $this->client->find($id);
        $client->role_id = $request->role_id;
        $client->update();

       return redirect()->route('ClientView');    }

}
