<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    Protected $fiilable = ['order_id','product','qty','unit_price','tax','price','taxamount','status'];

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

}
