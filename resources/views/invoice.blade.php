     @extends('layouts.master')
      @section('custom_css')
      <link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}">

      @endsection
      @section('content')             
 <!-- Page content-->
 <div class="content-wrapper">
  <div class="invoice-head" >  
    <!-- <div class="col-sm-2 col-ihe">
     <button class="btn btn-success btn-lg"><em class="fa fa-check"></em> Accept</button>
   </div>
   <div class="col-sm-2 col-ihe">
     <button class="btn btn-default btn-lg" data-toggle="modal" data-target="#decine"><em class="fa fa-close"></em> Decline</button>
   </div> -->

   <div class="col-sm-2 col-ihe">
    <button class="btn btn-default btn-lg" > <em class="fa fa-file-pdf-o"></em><a href=""  target="_blank ">  Download PDF</a></button>
  </div>
   <div class="col-sm-2 col-sm-offset-6">
    <button class="btn btn-success btn-lg" data-toggle="modal" href='#send-invoice'><em class="fa fa-print" onclick="window.print()"></em>print</button>
  </div> 
</div>
<br><br>
<div style="width:80%;margin-left:10%;border:solid #CCC .5px;min-height:900px;overflow:hidden;background-color:#FFF;box-shadow:1px 1px 50px #D9D9D9;" class="main">
  <div style="background-color:#fff;overflow:overlay;padding-top:25px;padding-bottom:25px;">
    <div style="width:94%;margin-left:3%;margin-right:3%;">
     <div style="float:left;margin-top:5px; width: 30%">
       <img src="{{ asset('img/salelogo2.png') }}" alt="logo" style="width: 100%" />
     </div>
     <div style="float:left; text-align: right; width:70%">
      <h2 style="color: #0f7393;border-bottom: solid #fff 2px;line-height: 11px;    margin-top: 31px;">INVOICE</h2>
      <p style="color: #0f7393;"> Invoice No : {{ $order->inv_no }}<br /></p>
    </div>
  </div>
</div>
<div style="clear:both;"></div>
<hr>
<div style="width:94%;margin-left:3%;margin-right:3%;margin-top:20px;">
  <div  style="float:left;">
   <p>From ,</p>
   <p style="font-size:14px;color:#666;line-height:25px;">
    XYZ COMPANY <br> 
    81 Factory Rd<br>
    PO 4075<br>
  </p>
</div>
<div style="float:right;text-align:right;">
  <p>To ,</p>
  <p style="font-size:14px;color:#666;line-height:25px;">

    {{ $order->customer_name }}<br>
    {{ $order->address}}<br>
    {{ $order->email}}<br>

  </p>
</div>
</div>
<div style="clear: both;"></div>
<hr>


<div style="width:94%;margin-left:3%;margin-right:3%;margin-top:20px;">
  <div style="float:right;text-align:right;">
    <p style="font-size:14px;color:#666;line-height:25px;">
     Date of Invoice : {{ $order->created_at->format('d/m/Y') }}<br />
     ABN : 41 613 732 031 <br>

   </p>
 </div>
</div>
<div style="clear: both;"></div>
<div style="clear: both;"></div>
<table cellspacing="10" border="0" style="width:96%;margin-left:2%;margin-right:2%;margin-top:10px;margin-bottom: 20px;">
  <tr>

    <th class="ht" style="width:44%;background-color:#7db1c1; color:#ffffff;font-weight: bold; ;line-height:30px; font-size: 15px; text-align: left; padding-left: 3px;padding-right: 3px">Description 
    </th>
    <th class="ht" style="width:14%;background-color:#7db1c1; color:#ffffff;font-weight: bold; ;line-height:30px; font-size: 15px; text-align: right; padding-right: 3px"> Quantity</th>
    <th class="ht" style="width:14%;background-color:#7db1c1; color:#ffffff;font-weight: bold; ;line-height:30px; font-size: 15px; text-align: right; padding-right: 3px">Unit Price</th>
    <th class="ht" style="width:14%;background-color:#7db1c1; color:#ffffff;font-weight: bold; ;line-height:30px; font-size: 15px; text-align: right; padding-right: 3px">GST</th>
    <th class="ht" style="width:14%;background-color:#7db1c1; color:#ffffff;font-weight: bold; ;line-height:30px; font-size: 15px; text-align: right; padding-right: 3px">Amount $</th>
  </tr>
  @foreach($ordet as $detail)
  {{--  @php
     $price = $detail->price;
     $gstprice = ($price*10)/100;
     $gstpr[] = ($price*10)/100;
     $ordstatts = App\OrderStatus::where('order_detail_id',$detail->id)->where('orderstatus',1)->first();
   @endphp --}}
  <tr  style="background: #e2e2e2;" >
    <td style="color:#666;line-height:20px;font-size:14px;border-bottom:solid #dee5e7 2px;padding-bottom:10px;text-align: left; padding-left: 3px;padding-right: 3px;">{{ $detail->product }}</td>
    <td style="color:#666;line-height:20px;font-size:14px;border-bottom:solid #dee5e7 2px;padding-bottom:10px;text-align: right; padding-right: 3px;">{{ $detail->qty }}</td>
    <td style="color:#666;line-height:20px;font-size:14px;border-bottom:solid #4a6e792e 2px;padding-bottom:10px;text-align: right; padding-right: 3px;"> $ &nbsp;  {{ number_format($detail->unit_price,2) }} </td>
    <td style="color:#666;line-height:20px;font-size:14px;border-bottom:solid #4a6e792e 2px;padding-bottom:10px;text-align: right; padding-right: 3px;"> 10%</td> 
    <td style="color:#666;line-height:20px;font-size:14px;border-bottom:solid #4a6e792e 2px;padding-bottom:10px;text-align: right; padding-right: 3px; text-align:right; padding-right: 18px">{{$detail->price}}</td>
     

  </tr>
  @endforeach


  <tr>
    <td colspan="4"  valign="middle" align="right">
      <p style="margin-block-start: .3em; margin-block-end: .3em;">Subtotal:</p>  </td>
      <td valign="middle" align="right" style="padding-right: 18px"> {{ $order->total_withno_tax }}</td>
    </tr>
    <tr>
      <td colspan="4"  valign="middle" align="right" style="border-bottom: 2px solid #dee5e7;">
        <p style="margin-block-start: .3em; margin-block-end: .3em;">Subtotal include Tax</p>   </td>
        <td valign="middle" align="right" style="border-bottom: 2px solid #dee5e7; padding-right: 18px; "> {{ $order->total_with_tax }}</td>
      </tr>
      <tr>
        <td colspan="4"  valign="middle" align="right">
          <p style="margin-block-start: .3em; margin-block-end: .3em;">Discount:</p>  </td>
          <td valign="middle" align="right" style="padding-right: 18px">
            
           {{ $order->discount }}</td>
        </tr>
       
          <tr>
            <td colspan="4"  valign="middle" align="right">
              <p style="margin-block-start: .3em; margin-block-end: .3em;">Actual Total:</p>  </td>
              <td valign="middle" align="right" style="padding-right: 18px"> {{ $order->total }}</td>
            </tr>
          
          </table>
        </div>
 
       <br><br>

       

        <div style="width: 80%; margin-left: 10%; margin-right: 10%;">
          <br>
          {{-- <a class="btn btn-sm btn-warning " href="{{ route('order.index') }}"> <i class=" fa fa-angle-double-left"></i> Back</a> --}}
        </div>
      </div>
    
                  
             


</div>

      




@endsection
