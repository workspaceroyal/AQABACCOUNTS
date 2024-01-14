@extends('user.admin_master')
@section('user')

<div class="page-content">
<div class="container-fluid">


<div class="row">
    <div class="col-lg-6">
        <div class="card"><br><br>
<center>
            <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap">
</center>

            <div class="card-body">
                <h4 class="card-title">নাম : {{ $adminData->name }} </h4>
                <hr>
                <h4 class="card-title">ইমেইল : {{ $adminData->email }} </h4>
                <hr>
                <h4 class="card-title">ইজার নেম : {{ $adminData->username }} </h4>
                <hr>
                <a href="{{ route('user.edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light" > এডিট প্রফাইল</a>

            </div>
        </div>
    </div>


                        </div>


</div>
</div>

@endsection
