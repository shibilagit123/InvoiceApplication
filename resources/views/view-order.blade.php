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

                <div class="table-responsive">
                              <table id="datatable2" class="table table-striped table-hover">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Customer name</th>
                                       <th>Delivery address</th>
                                       <th>Invoice No</th>
                                       <th>Order date</th>
                                       
                                       <th>Invoice Amount$</th>
                                       
                                       <th>View</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                  @foreach($order as $or)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $or->customer_name }} </td>
                                      <td>{{ $or->address }}</td>
                                      <td>{{ $or->inv_no }}</td>
                                     
                                      <td>{{ date('d/m/Y',strtotime(str_replace('/', '-', $or->date )))}}</td>
                                      <td>{{ $or->total}}</td>
                                      <td>
                                       <a  href='{{ route('order.show',['id'=>$or->id]) }}'><i class="fa fa-edit fa-lg text-info"></i></a>
                                      
                             
                                    </td>
                                  
                                    </tr>
                                    @endforeach


                                 </tbody>
                              </table>
                           </div>


               </div>
            </div>
          </div>






@endsection

@section('custom_js')
<script type="text/javascript" src="{{ asset('js/calendar.js') }}"></script>

@endsection
