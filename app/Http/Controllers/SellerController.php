<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(){
      return response()->json(Seller::all(),200);
    }

    public function store(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'contact_number' => 'required',
        'address_city' => 'required',
        'address_country' => 'required'
      ]);

      Seller::create($request->all());

      return response()->json("Success",200);
    }

    public function show($id){
      $seller = Seller::find($id);

      return response()->json($seller,200);
    }

    public function update(Request $request,$id){
      $this->validate($request, [
        'name' => 'required',
        'contact_number' => 'required',
        'address_city' => 'required',
        'address_country' => 'required'
      ]);

      $seller = Seller::find($id);
      $seller->update($request->all());

      return response()->json("Success",200);
    }

    public function destroy($id){
      $seller = Seller::find($id);

      $seller->delete();

      return response()->json("Success",200);
    }
}
