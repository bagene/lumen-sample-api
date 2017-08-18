<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
  protected $table = 'sellers';
  protected $fillable = ['name','contact_number','address_city','address_country'];

}
