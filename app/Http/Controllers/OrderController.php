<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
      return response()->json(Order::with('products')->get(),200);
    }

    public function store(Request $request){
      $this->validate($request, [
        'total_price' => 'required',
        'seller_id' => 'required',
        'customer_id' => 'required',
        'status' => 'required',
      ]);

      $order = Order::create($request->all());

      foreach ($request->get('products') as $key => $product) {
        $order->items()->create([
            'product_id' => $product["id"],
            'quantity' => $product["quantity"],
            'currency' => $product["currency"]
        ]);
      }

      return response()->json("Success",200);
    }

    public function show($id){
      $order = Order::with('products')->where('id',$id)->first();

      return response()->json($order,200);
    }

    public function update($id,Request $request){
      $this->validate($request, [
        'total_price' => 'required',
        'seller_id' => 'required',
        'customer_id' => 'required',
        'status' => 'required',
      ]);

      $order = Order::find($id);
      $order->update($request->all());

      return response()->json("Success",200);
    }

    public function destroy($id){
      $order = Order::find($id);

      $order->delete();

      return response()->json("Success",200);
    }
}
