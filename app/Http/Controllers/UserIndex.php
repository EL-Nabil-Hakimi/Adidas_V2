<?php

namespace App\Http\Controllers;

use App\Models\CategorieModel;
use App\Models\ProduitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserIndex extends Controller
{
    //
    protected $product ;
    protected $category;

    public function __construct(){
                $this->product = new ProduitModel();
                 $this->category = new CategorieModel();

    }

    public function indexUser(){
        $categories = $this->category->all();
        $products = $this->product->orderBy('id' ,'DESC')->paginate(9);
        return view('User.index' , compact('products' ,'categories'));
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
    

    public function search($title = null, $category = null)
    {
            $query = DB::table('produit')
                ->select('produit.*');

            if (!empty($title)) {
                $query->where(function ($query) use ($title) {
                    $query->where('produit.name', 'LIKE', '%' . $title . '%')
                        ->orWhere('produit.description', 'LIKE', '%' . $title . '%');
                });
            }

            if (!empty($category)) {
                $query->where('categorie_id', '=', $category);
            }

            $products = $query->orderBy('produit.id' , 'DESC')->paginate(5);

            return view('User.page_search', compact('products'));
    }
}