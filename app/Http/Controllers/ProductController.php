<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',[
            'products'=>$products
        ]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        // dd($request);
        $data = $request->validate([
            'name'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|decimal:2',
            'description'=>'required',
        ]);

        $newProduct = Product::create($data);
        return redirect(route('product.index'));
    }

    public function edit(Product $product){
        return view('products.edit',[
            'product'=>$product
        ]
    );
    }
    
    public function update(Product $product, Request $request) {
        $data = $request->validate([
            'name'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|decimal:2',
            'description'=>'required',
        ]);
        // // Mettre à jour les propriétés de l'objet Product avec les nouvelles valeurs
        // $data->name = $request->input('name');
        // $data->qty = $request->input('qty');
        // $data->price = $request->input('price');
        // $data->description = $request->input('description');
        
        // Sauvegarder les modifications dans la base de données
        $product->update($data);
    
        // Rediriger ou afficher la vue appropriée
        // Par exemple, si vous souhaitez rediriger vers la page d'affichage du produit :
        // return redirect()->route('products.show', ['product' => $product]);
    
        // Ou afficher une vue de confirmation
        return redirect(route('product.index'))->with(['Success','Product updated successfully']);

    }

    public function delete(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with(['Success','Product deleted successfully']);
    }
    
}
