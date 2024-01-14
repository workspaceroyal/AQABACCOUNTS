@extends('user.admin_master')
@section('user')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">সকল খরচ প্রিন্ট করুন</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('user.invoice.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> খরচ যুক্ত করুন </i></a> <br>  <br>

                    <h4 class="card-title">খরচের সকল ডাটা </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>নং</th>
                            <th>খরচের খাত</th>
                            <th>খরচ নং </th>
                            <th>তারিখ </th>
                            <th>বিবরণ</th>
                            <th>পরিমাণ</th>
                             <th>একশন</th>

                        </thead>


                        <tbody>

                        	@foreach($allData as $key => $item)
            <tr>
                <td> {{ $key+1}} </td>
                <td> {{ $item['payment']['customer']['name'] }} </td>
                <td> #{{ $item->invoice_no }} </td>
                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td>


                 <td>  {{ $item->description }} </td>

                <td>  ৳ {{ $item['payment']['total_amount'] }} </td>

                <td>
     <a href="{{ route('user.print.invoice',$item->id) }}" class="btn btn-danger sm" title="খরচ প্রিন্ট করুন" >  <i class="fa fa-print"></i> </a>
                </td>

            </tr>
                        @endforeach

                        </tbody>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection
