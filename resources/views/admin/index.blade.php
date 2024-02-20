@extends('admin.admin_master')

@section('admin')
<!-- Page-content -->
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h6 class="mb-sm-0">এডমিন ড্যাশবোর্ড</h6>

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">আপকিউব</a></li>
                            <li class="breadcrumb-item active">এডমিন ড্যাশবোর্ড</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="pb-0 card-body">
                        <div class="float-end d-none d-md-inline-block">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted">জমা<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <li ><a href="{{ route('purchase.all') }}">&nbsp; সকল জমা</a></li>
                                    <li><a href="{{ route('purchase.pending') }}">&nbsp; জমা পেন্ডিং</a></li>
                                    <li><a href="{{ route('daily.purchase.report') }}">&nbsp; প্রাত্যহিক রিপোর্ট</a></li>
                                    <li><a href="{{ route('supplier.all') }}">&nbsp; আয়ের উৎস</a></li>

                                </div>
                            </div>
                        </div>
                        <h6 class="mb-4 card-title">জমা হিসাব</h6>

                        <div class="m-1 row">
                            <a href="{{ route('purchase.add') }}" class=" btn btn-success btn-rounded waves-effect waves-light" ">নতুন জমা</i></a>
                        </div> <br>

                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>সকল জমা</strong></h6>
                                                <a href="{{ route('purchase.all') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>জমা পেন্ডিং</strong></h6>
                                                <a href="{{ route('purchase.pending') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>জমা রিপোর্ট</strong></h6>
                                                <a href="{{ route('daily.purchase.report') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>আয়ের উৎস</strong></h6>
                                                <a href="{{ route('supplier.all') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div>
                </div><!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="pb-0 card-body">
                        <div class="float-end d-none d-md-inline-block">
                            <div class="dropdown">
                                <a class="text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted">খরচ<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <li><a href="{{ route('invoice.all') }}">&nbsp; সকল খরচ</a></li>
                                    <li><a href="{{ route('invoice.pending.list') }}">&nbsp; খরচ পেন্ডিং</a></li>
                                    <li><a href="{{ route('print.invoice.list') }}">&nbsp; খরচ প্রিন্ট</a></li>
                                    <li><a href="{{ route('daily.invoice.report') }}">&nbsp; খরচ রিপোর্ট</a></li>

                                </div>
                            </div>
                        </div>
                        <h6 class="mb-4 card-title">খরচ হিসাব</h6>

                        <div class="m-1 row">
                            <a href="{{ route('invoice.add') }}" class=" btn btn-success btn-rounded waves-effect waves-light" ">নতুন খরচ</i></a>
                        </div> <br>

                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>সকল খরচ</strong></h6>
                                                <a href="{{ route('invoice.all') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>খরচ পেন্ডিং</strong></h6>
                                                <a href="{{ route('invoice.pending.list') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>খরচ প্রিন্ট</strong></h6>
                                                <a href="{{ route('daily.invoice.report') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>খরচ রিপোর্ট</strong></h6>
                                                <a href="{{ route('purchase.all') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="pb-0 card-body">
                        <div class="float-end d-none d-md-inline-block">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted">অর্থের তহবিল <i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <li ><a href="{{ route('stock.report') }}">&nbsp; সকল তহবিল রিপোর্ট</a></li>
                                    <li><a href="{{ route('stock.supplier.wise') }}">&nbsp; উৎস ভিত্তিক রিপোর্ট</a></li>
                                    <li><a href="{{ route('category.all') }}">&nbsp; অর্থের সকল খাত</a></li>
                                    <li><a href="{{ route('product.all') }}">&nbsp; তহবিল খাত তালিকা</a></li>

                                </div>
                            </div>
                        </div>
                        <h6 class="mb-4 card-title">তহবিল</h6>

                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">

                                    <div class="m-2 row">
                                        <a href="{{ route('invoice.add') }}" class="mt-2 btn btn-success btn-rounded waves-effect waves-light" ">অর্থের নতুন খাত</i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>অর্থের সকল খাত</strong></h6>
                                                <a href="{{ route('category.all') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">

                                    <div class="m-2 row">
                                        <a href="{{ route('invoice.add') }}" class="mt-2 btn btn-success btn-rounded waves-effect waves-light" ">নতুন তহবিল খাত</i></a>
                                    </div>

                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>তহবিল খাত তালিকা</strong></h6>
                                                <a href="{{ route('product.all') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>সকল তহবিল রিপোর্ট</strong></h6>
                                                <a href="{{ route('stock.report') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>উৎস ভিত্তিক রিপোর্ট</strong></h6>
                                                <a href="{{ route('stock.supplier.wise') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="pb-0 card-body">
                        <div class="float-end d-none d-md-inline-block">
                            <div class="dropdown">
                                <a class="text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted">ব্যয়ের খাত ভিত্তিক রিপোর্ট<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <li><a href="{{ route('customer.all') }}">&nbsp; ব্যয়ের সকল খাত</a></li>
                                    <li><a href="{{ route('credit.customer') }}">&nbsp; ব্যয়ের অগ্রিম রিপোর্ট</a></li>
                                    <li><a href="{{ route('paid.customer') }}">&nbsp; পরিশোধনীয় রিপোর্ট</a></li>
                                    <li><a href="{{ route('customer.wise.report') }}">&nbsp; খাত ভিত্তিক রিপোর্ট</a></li>

                                </div>
                            </div>
                        </div>
                        <h6 class="mb-4 card-title">ব্যয়ের খাত</h6>

                        <div class="m-1 row">
                            <a href="{{ route('invoice.add') }}" class=" btn btn-success btn-rounded waves-effect waves-light" ">ব্যয়ের নতুন খাত</i></a>
                        </div> <br>

                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>ব্যয়ের সকল খাত</strong></h6>
                                                <a href="{{ route('customer.all') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>অগ্রিম ব্যয় রিপোর্ট</strong></h6>
                                                <a href="{{ route('credit.customer') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>পরিশোধনীয় রিপোর্ট</strong></h6>
                                                <a href="{{ route('paid.customer') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-6 col-md-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2"><strong>খাত ভিত্তিক রিপোর্ট</strong></h6>
                                                <a href="{{ route('customer.wise.report') }}" class="btn btn-success btn-rounded waves-effect waves-light" ">ক্লিক করুন </i></a>

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-bdt font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                    </div>

                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>

    </div>

</div>
<!-- End Page-content -->
@endsection
