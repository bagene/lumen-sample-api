<?php

namespace App\Http\Controllers;

use App\Product;
use App\Test;

class ProductController extends Controller
{
    public function index(){
      return response()->json(Product::all(),200);
    }

    public function store(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'price' => 'required',
        'seller_id' => 'required',
      ]);

      Product::create($request->all());

      return response()->json("Success",200);
    }

    public function show($id){
      $product = Product::find($id);

      return response()->json($product,200);
    }

    public function update($id,Request $request){
      $this->validate($request, [
        'name' => 'required',
        'price' => 'required',
        'seller_id' => 'required',
      ]);

      $product = Product::find($id);
      $product->update($request->all());

      return response()->json("Success",200);
    }

    public function destroy($id){
      $product = Product::find($id);

      $product->delete();

      return response()->json("Success",200);
    }

    public function test(){
      $test = Test::create([
        'test' => json_encode($_POST)
      ]);

    }
}