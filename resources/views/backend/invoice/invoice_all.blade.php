@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">সকল খরচ</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('invoice.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> খরচ যুক্ত করুন </i></a> <br>  <br>

                    <h4 class="card-title">খরচের সকল ডাটা </h4>


                    {{-- <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead> --}}
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>খরচ নং </th>
                            <th>তারিখ </th>
                            <th>খরচের খাত</th>
                            <th>বিবিরণ</th>
                            <th>পরিমাণ</th>

                        </thead>


                        <tbody>

                        	@foreach($allData->sortByDesc('invoice_no') as $key => $item)
            <tr>
                <td> #{{ $item->invoice_no }} </td>
                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td>
                <td> {{ $item['payment']['customer']['name'] }} </td>
                 <td>  {{ $item->description }} </td>
                <td>  ৳ {{ $item['payment']['total_amount'] }} </td>

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
