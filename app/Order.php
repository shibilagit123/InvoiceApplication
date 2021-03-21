<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    Protected  $fillable = ['customer_name','phone','email','address','inv_no','date','total_withno_tax','total_with_tax','discount','total','status'];

     public function order_details()
    {
    	return $this->hasmany('App\OrderDetail');
    }
}
