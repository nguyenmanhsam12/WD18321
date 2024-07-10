<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\FunctionContextPass;

class ProductController extends Controller
{
    public function listProduct()
    {
        $products = DB::table('product')
        ->join('category','category.id','=','product.category_id')
        ->select('product.id','product.name','product.price','product.view','category.nameCategory')
        ->orderBy('view','desc')
        ->get();
        return view('products.index', compact('products'));
    }

    public function addProduct()
    {
        $list_category = DB::table('category')->get();
        return view('products.add', compact('list_category'));
    }

    public function postProduct(Request $request)
    {
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'view' => $request->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];

        DB::table('product')->insert($data);
        return redirect(route('product.index'));
    }

    public function deleteProduct($id)
    {
        DB::table('product')->where('id', $id)->delete();
        return redirect(route('product.index'));
    }

    public function editProduct($id)
    {
        $product = DB::table('product')->find($id);
        $list_category = DB::table('category')->get();
        return view('products.edit', compact('product', 'list_category'));
    }

    public function updateProduct($id, Request $request)
    {
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'view' => $request->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];

        DB::table('product')->where('id', $id)->update($data);
        return redirect(route('product.index'));
    }

    public function timkiem(Request $request){
        $name = $request->nameProduct;
        
        $products = DB::table('product')
        ->join('category','category.id','=','product.category_id')
        ->select('product.id','product.name','product.price','product.view','category.nameCategory')
        ->where('product.name','like','%'.$name.'%')
        ->orderBy('view','desc')
        ->get();
        // dd($products);
        return view('products.index',compact('products'));
    }
}
