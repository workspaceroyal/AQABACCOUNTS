@extends('admin.admin_master')
@section('admin')

 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">অর্থের সকল খাত</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('unit.category.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> অর্থের খাত যুক্ত করুন </i></a> <br>  <br>

                    <h4 class="card-title">অর্থের খাত সকল ডাটা </h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th width="5%">নং</th>
                            <th>নাম</th>
                            <th width="20%">একশন</th>

                        </thead>


                        <tbody>

                        	@foreach($categoris as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item->name }} </td>
                            <td>
   <a href="{{ route('unit.category.edit',$item->id) }}" class="btn btn-info sm" title="এডিট ডাটা">  <i class="fas fa-edit"></i> </a>

     <a href="{{ route('unit.category.delete',$item->id) }}" class="btn btn-danger sm" title="ডিলেট ডাটা" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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
