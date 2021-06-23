<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Console\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Factory;
;

class ProductController extends Controller
{

    public function index(): Factory|View|Application
    {
        $products = Product::all();
        return view('products.list',compact('products'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $productKey = 'product_'.$id;
        if(!Session::has($productKey)){
            Product::where('id',$id)->increment('view_count');
            Session::put($productKey,1);
        }
        $product = Product::find($id);
        return view('products.show',compact('product'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
