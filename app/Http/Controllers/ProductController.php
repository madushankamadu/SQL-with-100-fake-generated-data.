<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;



class ProductController extends Controller
{

    public function editRoute($id)
    {
        $product = Product::find($id);
        $filter= Category::select('category')->distinct()->get();
        return view('edit')->with('product', $product)->with('filter', $filter); 
    }


    public function edit(Request $request, $id)
    {


        $request->validate([
            'product'=>'required|max:191',
            'category'=>'required|max:191',
        ]);

        $product = Product::find($id);

        $product->product=$request->product;
        $product->category=$request->category;
        $product->save();

        $products = Product::all();
        return redirect('home')->with('products',$products);
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'category'=>'required|max:191',
        ]);

        $category =new Category;
        $category->category=$request->category;
        $category->save();
        return response()->json(['message'=>'product added successfully'], 200);
    }
    
}
