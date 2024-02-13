<?php

namespace App\Http\Controllers;

use App\Models\CategorieModel;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    protected $categorie;
    public function __construct(){
        $this->categorie = new CategorieModel();

    }
    public function index(){
        $categories = $this->categorie->all();
        return view('Layout.Category.categorie')->with('categories', $categories);
    }
    public function AddCategoriePage(){
        return view('Layout.Category.addcategorie');
    }
    public function modifyCategoriePage(Request $request){
        $id = $request->id;
        $categorie = $this->categorie->find($id);
        return view('Layout.Category.modifycategorie')->with('categorie' ,$categorie);
    }
    public function modifyCategorie(Request $request){

        $id = $request->id;        
        $categorie = $this->categorie->find($id);
        $categorie->name = $request->name;
        $categorie->save();
        return redirect()->route('CategorieView');

    }

    public function DeleteCategorie(Request $request){
        $id = $request->id;
        $this->categorie->find($id)->delete();
        return redirect()->route('CategorieView');
    }

    public function AddCategorie(Request $request){
        $categorie = $this->categorie;
        $categorie->name = $request->name;
        $categorie->save();
        return redirect()->route('CategorieView');
    }

}
