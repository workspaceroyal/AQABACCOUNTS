@extends('user.admin_master')
@section('user')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">পরিশোধনীয় ব্যয়ের সকল রিপোর্ট</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('user.paid.customer.print.pdf') }}" class="btn btn-dark btn-rounded waves-effect waves-light" target="_black" style="float:right;"><i class="fa fa-print"> পরিশোধনীয় ব্যয়ের রিপোর্ট প্রিন্ট </i></a> <br>  <br>

                    <h4 class="card-title">পরিশোধনীয় ব্যয়ে রিপোর্ট সকল ডাটা </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>নং</th>
                            <th>নাম</th>
                            <th>ব্যয় নং </th>
                            <th>তারিখ</th>
                            <th>অগ্রিম পরিমাণ</th>
                            <th>একশন</th>

                        </thead>


                        <tbody>

                        	@foreach($allData as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item['customer']['name'] }} </td>
                            <td> {{ $item['invoice']['invoice_no'] }}</td>
                            <td> {{ date('d-m-Y',strtotime($item['invoice']['date'])) }} </td>
                            <td> ৳ {{ $item->due_amount }} </td>
                            <td>
   <a href="{{ route('user.customer.invoice.details.pdf',$item->invoice_id) }}" class="btn btn-info sm" target="_black" title="বিস্তারিত">  <i class="fa fa-eye"></i> </a>


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
