<?php

namespace App\Http\Controllers;

use App\Customer;

class CustomerController extends Controller
{
    public function index(){
      return response()->json(Customer::all(),200);
    }

    public function store(Request $request){
      $this->validate($request, [
        'name' => 'required',
        'contact_number' => 'required',
        'address_city' => 'required',
        'address_country' => 'required',
        'lat' => 'required',
        'lng' => 'required'
      ]);

      Customer::create($request->all());

      return response()->json("Success",200);
    }

    public function show($id){
      $Customer = Customer::find($id);

      return response()->json($Customer,200);
    }

    public function update($id,Request $request){
      $this->validate($request, [
        'name' => 'required',
        'contact_number' => 'required',
        'address_city' => 'required',
        'address_country' => 'required',
        'lat' => 'required',
        'lng' => 'required'
      ]);

      $Customer = Customer::find($id);
      $Customer->update($request->all());

      return response()->json("Success",200);
    }

    public function destroy($id){
      $Customer = Customer::find($id);

      $Customer->delete();

      return response()->json("Success",200);
    }
}
