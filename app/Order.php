<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';
  protected $fillable = ['total_price','seller_id','customer_id','status'];

  public function items(){
  	return $this->hasMany('App\OrderItem','order_id','id');
  }

  public function products(){
  	return $this->belongsToMany('App\Product','order_items');
  }

}
