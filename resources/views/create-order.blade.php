     @extends('layouts.master')
      @section('custom_css')
      <link rel="stylesheet" type="text/css" href="{{ asset('css/calendar.css') }}">

      @endsection
      @section('content')
      <!-- Page content-->
      
      <div class="content-wrapper">

        <div class="container-fluid">
          
          <div class="panel panel-default">
            <div class="panel-body">

              <form class="form-horizontal" action="{{ route('order.store') }}" id="form-order">
                @csrf


                <div class="row">
                  <div class="col-sm-6">
                    <div class=""> 
                      <legend> Customer detail</legend>

                      <div class="form-group">
                        <div class="col-sm-12">
                         <label class="control-label">
                           Customer Name
                         </label>
                         <input type="text" name="customer_name" class="form-control"  placeholder="Customer Name">
                        
                     </div>
                   </div>

                   <div class="form-group">
                       <div class="col-sm-12">

                       <div class="col-sm-6">
                         <label class="control-label">
                          Phone number
                        </label>
                        <input type="number" name="phone" class="form-control"  placeholder="Phone number">
                      </div>
                  
                   
                      <div class="col-sm-6">
                       <label class="control-label">
                        Email ID
                      </label>
                      <input type="text" name="email" class="form-control"  placeholder="Email ID">
                    </div>
                    
               </div>
             </div>
               <div class="form-group">
                 <div class="col-sm-12">
                   <label class="control-label">
                     Address
                   </label>
                   <textarea  name="address" rows="4" class="form-control"  placeholder="Type.."></textarea>
                 </div>
               </div>

             </div>
           </div>

           <!-- customer detail end -->

           <div class="col-sm-6">
             <legend> Order detail</legend>

             <div class="form-group">
              <div class="col-sm-12">
               <label class="control-label">
                 Order number
               </label>
               <input type="text" name="inv_no" class="form-control" placeholder="Invoice number" value="{{ generateRandomString() }}">
             </div>
           </div>
           <div class="form-group">
            <div class="col-sm-12">
             <label class="control-label">
              Date
            </label>
            <div class="input-group date" id="datetimepicker3">
             <input type="text" class="form-control" name="date" placeholder="DD/MM/YYYY">
             <span class="input-group-addon">
              <span class="fa fa-calendar"></span>
            </span>
          </div>
        </div>
      </div>
      
    
    
  

 </div>

</div>
<!-- row end -->

<br>



<div id="append-div"> 
  <div class="form-group">
    <div class="col-sm-3">
     <label class="control-label">
      Product Name
    </label>
    
    <input type="text" name="product[]" class="form-control"  placeholder="product">
  
 </div>
 <div class="col-sm-2">
   <label class="control-label">
    QTY
  </label>
  <div class="input-group">
   <input type="number" name="qty[]" class="form-control" placeholder="QTY" onkeyup="calculAmt(this);" onchange="calculAmt(this);" step="any">
   
 </div>
</div>
<div class="col-sm-2">
 <label class="control-label">
  Unit price
</label>
<input type="stepany" name="unit_price[]" class="form-control uprice" placeholder="Unit price" onkeyup="calculAmt2(this);" onchange="calculAmt2(this);" id="uprice">
</div>

<div class="col-sm-2">
 <label class="control-label">
  Select Tax
</label>
 <select class="form-control" name="tax[]" id="tax" onchange="taxchange(this);"  onselect="taxchange(this);"> 

  <option value="0%">0%</option>
  <option value="1%">1%</option>
  <option value="5%">5%</option>
  <option value="10%">10%</option>
</select>
</div>

<div class="col-sm-3">
 <label class="control-label">
  Price
</label>
<input type="text" name="price[]" class="form-control" placeholder="Price" id="amount">
{{-- <input type="hidden" name="withtaxprice[]" class="form-control" placeholder="Price" id="withtaxprice"> --}}
</div>
</div>


</div>
<div class="form-group">
  <div class="col-sm-3">
   <button type="button" class=" btn btn-success" title="Add more" data-toggle="tooltip" id="add-more"> Add more <i class="fa fa-plus"></i></button>
 </div>
</div>
<br>
<div class="form-group">
 <div class="col-sm-3 pull-right">
 <label class="control-label">
  SubTotal without Tax
</label>
<input type="text" name="total_withno_tax" class="form-control" placeholder="SubTotal" id="totalwithno">

</div>
</div>
   <div class="form-group">
<div class="col-sm-3 pull-right">
 <label class="control-label">
  SubTotal with Tax
</label>
<input type="text" name="total_with_tax" class="form-control" placeholder="SubTotal" id="totalwith">
{{-- <input type="hidden" name="total_with_tax" class="form-control" placeholder="SubTotal" id="totalwithhid"> --}}
</div>
</div> 
<div class="form-group">
<div class="col-sm-3 pull-right">
 <label class="control-label">
  Discount
</label>
<input type="text" name="discount" class="form-control" placeholder="Discount" id="discount" onkeyup="discountcal(this);" onchange ="discountcal(this);">

</div>
</div> 
<div class="form-group">
<div class="col-sm-3 pull-right">
 <label class="control-label">
  Total
</label>
<input type="text" name="total" class="form-control" placeholder="Total" id="total">
{{-- <input type="hidden" name="total_with_tax" class="form-control" placeholder="SubTotal" id="totalwithhid"> --}}
</div>
</div> 


<div class="form-group">
 <div class="col-sm-12">
  <div class="pull-right">
   <button class="btn btn-sm btn-info" type="submit">Create invoice</button>
 </div>  
</div>
</div>

</form>
      <!-- <div id="calendar"></div>
      -->
    </div>
  </div>
</div>






@endsection
@php
function generateRandomString($length = 10 ) {
  $keysapce='0123456789';
  $characters = 'INV';
  
  $date = date('dmHis');
  $charactersLength = str_replace('-', '', $date) ;
  $max = strlen($charactersLength) - 1;
  
  $randomString = '';
  
  return $characters.$date.rand(0,1000);
}
@endphp
@section('custom_js')
<script type="text/javascript" src="{{ asset('js/calendar.js') }}"></script>
<script>
 
 
  
</script>
<script type="text/javascript">

$('#datetimepicker3').datetimepicker({
  defaultDate: new Date(),
  format: 'DD/MM/YYYY',

});


$(document).ready(function() {

      // loop date picker
      $('#datetimepickera1').datetimepicker({
        defaultDate: new Date(),
        format: 'DD/MM/YYYY',

        icons: {
          time: 'fa fa-clock-o',
          date: 'fa fa-calendar',
          up: 'fa fa-chevron-up',
          down: 'fa fa-chevron-down',
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-crosshairs',
          clear: 'fa fa-trash'
        }
      });

      var i = 5;
      
      $('#add-more').click(function() {


        i++;
        $('#append-div').append('<div class="loop-div">  <div class="form-group"> <div class="col-sm-3"> <input type="text" name="product[]" class="form-control"  placeholder="product"></div><div class="col-sm-2"><div class="input-group"> <input type="number" name="qty[]" class="form-control" placeholder="QTY" onkeyup="calculAmt(this);" onchange="calculAmt(this);" step="any"></div></div><div class="col-sm-2"><input type="text" name="unit_price[]" class="form-control uprice" placeholder="Unit price" onkeyup="calculAmt2(this);" onchange="calculAmt2(this);"></div><div class="col-sm-2"><select class="form-control" name="tax[]" id="tax" onchange="taxchange(this);"  onselect="taxchange(this);">'+
         
          '<option value="0%">0%</option><option value="1%">1%</option><option value="5%">5%</option><option value="10%">10%</option>'+
          
          ' </select></div><div class="col-sm-3"><input type="text" name="price[]" class="form-control" placeholder="Price" id="amount"> </div><div class="col-sm-1"> <button type="button" class=" btn-danger btn-block dlt-div pdd" title="Delete" data-toggle="tooltip"> <i class="fa fa-trash fa-x"></i></button></div></div>');

        $('.dlt-div').click(function() {

          $(this).parents('div.loop-div').remove();
          
        });



       //  $('.select2').select2({
       //   theme: 'bootstrap'
       // });



// loop date picker
$('#datetimepicker'+i+'').datetimepicker({
  defaultDate: new Date(),
  format: 'DD/MM/YYYY',

  icons: {
    time: 'fa fa-clock-o',
    date: 'fa fa-calendar',
    up: 'fa fa-chevron-up',
    down: 'fa fa-chevron-down',
    previous: 'fa fa-chevron-left',
    next: 'fa fa-chevron-right',
    today: 'fa fa-crosshairs',
    clear: 'fa fa-trash'
  }
});

// $('.getDateFrom').val($('#del_date').val());


});  
    });

$('#form-order').submit(function(event) {

  /* Act on the event */
  event.preventDefault();
  var form = document.getElementById('form-order');
  var fdata = new FormData(form);
  var url = '{{ route('order.show',['id'=>'slug']) }}';
  $.ajax({
    url: $(this).attr('action'),
    type: 'POST',
    dataType: 'json',
    data: fdata,
    processData: false,
    contentType: false
  })
  .done(function(data) {
    if(data.status=="error")
    {
      swal('Warning',data.msg, 'warning');
    }
    else
    {
      swal({
        title: "Success!",
        text: data.msg,
        type: "success"
      }, function() {
        var slug = data.ax;
        window.location.href = url.replace('slug', slug);
      });
    }
  });
  
});



function calculAmt(ele) {
 
 var qty = $(ele).val();

 var rate = $(ele).parent().parent().siblings().find('input[name="unit_price[]"]').val();
 var amt = qty * rate;
  
 subtotal();
 taxselect();
 var subtottax = $('#totalwith').val();
  var disc = $('#discount').val();
  if(disc==''||disc==null)
 {
  var disc ='0';
 }
  $('#total').val(parseFloat(subtottax)-parseFloat(disc).toFixed(2));
 return $(ele).parent().parent().siblings().find('input[name="price[]"]').val(amt.toFixed(2));
 // $('#totalwithno').val(amt.toFixed(2));
 // var price = $('#price').val();
 //  alert(price);
}

function calculAmt2(ele) {
 var rate = $(ele).val();
 var qty = $(ele).parent().siblings().find('input[name="qty[]"]').val();
 var amt = qty * rate;
 subtotal();
 taxselect();
 var subtottax = $('#totalwith').val();
 var disc = $('#discount').val();
 if(disc==''||disc==null)
 {
  var disc ='0';
 }
  $('#total').val(parseFloat(subtottax)-parseFloat(disc).toFixed(2));
 return $(ele).parent().siblings().find('input[name="price[]"]').val(amt.toFixed(2));


 // var price = $('#price').val();
 //  alert(price);
 //  console.log(price);
}
function taxchange(ele)
{
   var tax = $(ele).val();
   var price=  $(ele).parent().siblings().find('input[name="price[]"]').val();
   var withtax = tax*price;
   subtotal();
   taxselect();
   var subtottax = $('#totalwith').val();
   var disc = $('#discount').val();
   if(disc==''||disc==null)
 {
  var disc ='0';
 }
  $('#total').val(parseFloat(subtottax)-parseFloat(disc).toFixed(2));
   // return $(ele).parent().sibilings().find('input[name="withtaxprice[]"]').val(withtax.toFixed(2));
}

function taxselect()
{
  var input = document.getElementsByName('tax[]'); 
  var price = document.getElementsByName('price[]');

  var t ="";
  var p ="";
  var taxwith=[];
  for (var i = 0; i < input.length; i++) { 
                var s= input[i]; 
                var p= price[i]; 
                t[i] = t + "input[" + i + "].value= " 
                                   + s.value + " "; 
                p[i] = p + "price[" + i + "].value= " 
                                   + s.value + " "; 
                           taxwith[i] = (parseInt(p.value)+(parseInt(s.value)*parseInt(p.value))/100);
                          // console log(taxwith[i]);  
                          // alert(t[i]);     
                                    // taxwith[i] = parseInt(s.value);
            } 
            // alert(p.value);
              console.log(s.value);                       
              console.log(p.value)
              console.log(taxwith
                );        
                 var sumall = taxwith.reduce(function(a, b){
        return a + b;
    }, 0);               
      $('#totalwith').val(sumall);
}

// $(document).ready(function() {

//   var price = $('#amount').val();
//   alert(price);
//   console.log(price);
//   $('#totalwithno').val(price.toFixed(2));
//   // subtotal();
// })
function subtotal()
{  
  var input = document.getElementsByName('price[]'); 
  var k = ""; 
  var total=0;
  var allamnt = [];
            for (var i = 0; i < input.length; i++) { 
                var a = input[i]; 
                k[i] = k + "price[" + i + "].value= " 
                                   + a.value + " "; 
                                   
                                    // total = a.value[];
                                    allamnt[i] = +parseInt(a.value);
            } 
            // var allamnt = [a.value];
            // var allamnt = allamnt();
            var sum = allamnt.reduce(function(a, b){
        return a + b;
    }, 0);
            console.log(sum);
          
             $('#totalwithno').val(sum);
             // alert(allamnt);
  
            // document.getElementById("totalwithnohid").val('2'); 
            // document.getElementById("po").innerHTML = "Output"; 
}
function discountcal(ele)
{ 
  var disc =  $(ele).val();
  var subtottax = $('#totalwith').val();
 $('#total').val(parseFloat(subtottax)-parseFloat(disc).toFixed(2));
}
</script>





@endsection
