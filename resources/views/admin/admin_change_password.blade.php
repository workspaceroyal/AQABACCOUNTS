@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">পাসওয়ার্ড পরিবর্তনের পৃষ্ঠা</h4><br><br>


            @if(count($errors))
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                @endforeach

            @endif


            <form method="post" action="{{ route('update.password') }}" >
                @csrf

            <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">পুরাতন পাসওয়ার্ড</label>
                <div class="col-sm-10">
                    <input name="oldpassword" class="form-control" type="password"   id="oldpassword">
                </div>
            </div>
            <!-- end row -->


             <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">নতুন পাসওয়ার্ড</label>
                <div class="col-sm-10">
                <input name="newpassword" class="form-control" type="password"  id="newpassword">
                </div>
            </div>
            <!-- end row -->



             <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">পাসওয়ার্ড পুনরায় দিন</label>
                <div class="col-sm-10">
                    <input name="confirm_password" class="form-control" type="password"   id="confirm_password">
                </div>
            </div>
            <!-- end row -->




<input type="submit" class="btn btn-info waves-effect waves-light" value="পরিবর্তন করুন">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>



@endsection
