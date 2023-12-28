@extends('user.admin_master')
@section('user')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">মুদ্রা তালিকা</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('unit.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> মুদ্রা যুক্ত করুন </i></a> <br>  <br>

                    <h4 class="card-title">মুদ্রা সকল ডাটা </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th width="5%">নং</th>
                            <th>নাম</th>
                            <th width="20%">একশন</th>

                        </thead>


                        <tbody>

                        	@foreach($units as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item->name }} </td>
                            <td>
   <a href="{{ route('unit.edit',$item->id) }}" class="btn btn-info sm" title="এডিট ডাটা">  <i class="fas fa-edit"></i> </a>

     <a href="{{ route('unit.delete',$item->id) }}" class="btn btn-danger sm" title="ডিলেট ডাটা" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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
