<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class HomeController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        
        $products = Product::all();
        $filter= Product::select('category')->distinct()->get();
        return view('home')->with('products',$products)->with('filter', $filter);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product'=>'required|max:191',
            'category'=>'required|max:191',
        ]);

        $input = $request->all();
        Product::create($input);
        return redirect('home')->with('flash_message', 'product Addedd!');
    }

    

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('home')->with('flash_message', 'Student deleted!');  
    }
    

    public function filterData(Request $category){

        $items = $category->all();
        
        $filter= Product::select('category')->distinct()->get();
        
        $products = DB::select('select * from products where category = ?', [$items['category']]);


        return view('home')->with('products',$products)->with('filter', $filter);
        
    }

}
