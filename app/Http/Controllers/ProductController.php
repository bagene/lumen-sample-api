<?php

namespace App\Http\Controllers;

use App\Product;

use App\Test;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
      return response()->json(Product::all(),200);
    }

    public function store(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'price' => 'required',
      ]);

      Product::create($request->all());

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
      dd($test->toJson());
    }

    public function testShow(){
      $tests = Test::all();
      $str = "";
      foreach ($tests as $key => $value) {
        $str .= $value->toJson() . "<br>" . "<br>" . "<br>";
      }
      dd($str);
    }
}
