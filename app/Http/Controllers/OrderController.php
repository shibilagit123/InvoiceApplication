<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['order']=Order::latest()->get();
        return view('view-order',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = [
            'customer_name' => 'required',
            'product.*'=>'required',
            'qty.*'=>'required|numeric',
            'unit_price.*'=>'required|numeric',
            'date' => 'required',
        ];

        

        $validation = Validator::make($request->all(), $rules);

        if($validation->fails())
        {
            $errors = $validation->errors();
            $ajax['status'] = "error";
            $ajax['msg'] = $errors->all()[0];
        }
        else
        {
            $arr['customer_name']=$request->customer_name;
            $arr['phone']=$request->phone;
            $arr['email']=$request->email;
            $arr['address']=$request->address;
            $arr['inv_no']=$request->inv_no;
            $arr['date']=date('Y/m/d',strtotime(str_replace('/','-',$request->date)));
            $arr['total_withno_tax']=$request->total_withno_tax;
            $arr['total_with_tax']=$request->total_with_tax;
            $arr['discount']=$request->discount;
            $arr['total']=$request->total;
            $ax = Order::create($arr);

            $product = $request->product;
            $qty = $request->qty;
            $uprice = $request->unit_price;
            $tax = $request->tax;
            $price = $request->price;
            foreach ($product as $key=> $value) {
                $amnt =(($price[$key])*(str_replace('%', '',$tax[$key]))/100);
               $data = new OrderDetail;
               $data->order_id=$ax->id;
                $data->product=$product[$key];
                $data->qty=$qty[$key];
                $data->unit_price=$uprice[$key];
                $data->tax=$tax[$key];
                $data->price=$price[$key];
                $data->taxamount=$amnt;

                $data->save();
            
            }
            $ajax['status'] = "success";
            $ajax['msg'] = 'Order has been created';
            $ajax['ax'] =$ax->id;
        }
        echo json_encode($ajax);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['order'] =Order::find($id);
        $data['ordet']= OrderDetail::where('order_id',$id)->get();
        return view('invoice',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
