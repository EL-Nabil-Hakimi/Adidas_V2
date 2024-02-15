<?php

namespace App\Http\Controllers;

use App\Models\ProduitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserIndex extends Controller
{
    //
    protected $product ;
    public function __construct(){
                $this->product = new ProduitModel();
    }

    public function indexUser(){
        $products = $this->product->orderBy('id' ,'DESC')->paginate(9);
        return view('User.index' , compact('products'));
    }
    public function contact(){
        
        return view('User.contact');
    }
    public function produits(){
        
        return view('User.produits');
    }
    public function news(){
        
        return view('User.news');
    }
    public function about(){
        
        return view('User.about');
    }
    

    public function search($title = "")
    {   
        $products = DB::table('produit')
        ->where('name', 'LIKE', '%' . $title . '%')
        ->orWhere('description', 'LIKE', '%' . $title . '%')
        ->orderBy('id' , 'DESC')
        ->paginate(5);

        return view('User.page_search', compact('products'));
    }
}
