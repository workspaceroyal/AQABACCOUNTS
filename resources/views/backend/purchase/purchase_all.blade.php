@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">সকল জমা</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('purchase.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> নতুন জমা </i></a> <br>  <br>

                    <h4 class="card-title">জমা সকল ডাটা </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>জমা নং</th>
                            <th>তারিখ </th>
                            <th>আয়ের উৎস</th>
                            <th>অর্থের খাত</th>
                            <th>পরিমাণ</th>
                            <th>তহবিল খাত</th>
                            <th>বিবিরণ</th>
                            <th>অবস্থা</th>

                        </thead>


                        <tbody>

                        	@foreach($allData->sortByDesc('invoice_no') as $key => $item)
            <tr>
                <td> {{ $item->purchase_no }} </td>
                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td>
                <td> {{ $item['supplier']['name'] }} </td>
                <td> {{ $item['category']['name'] }} </td>
                <td>৳ {{ $item->buying_qty }} </td>
                <td> {{ $item['product']['name'] }} </td>
                <td>  {{ $item->description }} </td>

                <td>
                    @if($item->status == '0')
                    <span class="btn btn-warning">পেন্ডিং</span>
                    @elseif($item->status == '1')
                    <span class="btn btn-success">এপ্রুভড</span>
                    @endif
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
