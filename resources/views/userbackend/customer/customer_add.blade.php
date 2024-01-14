@extends('user.admin_master')
@section('user')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">ব্যয়ের খাত যুক্ত করুন</h4><br><br>



    <form method="post" action="{{ route('user.customer.store') }}" id="myForm" enctype="multipart/form-data" >
                @csrf

            <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">নাম </label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->


              <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">মোবাইল </label>
                <div class="form-group col-sm-10">
                    <input name="mobile_no" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->


  <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">ইমেইল </label>
                <div class="form-group col-sm-10">
                    <input name="email" class="form-control" type="email"  >
                </div>
            </div>
            <!-- end row -->


  <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">ঠিকানা </label>
                <div class="form-group col-sm-10">
                    <input name="address" class="form-control" type="text"  >
                </div>
            </div>
            <!-- end row -->

              <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">ছবি </label>
                <div class="form-group col-sm-10">
       <input name="customer_image" class="form-control" type="file"  id="image">
                </div>
            </div>
            <!-- end row -->

              <div class="mb-3 row">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
   <img id="showImage" class="rounded avatar-lg" src="{{  url('upload/no_image.jpg') }}" alt="Card image cap">
                </div>
            </div>
            <!-- end row -->





<input type="submit" class="btn btn-info waves-effect waves-light" value="যুক্ত করুন">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                 mobile_no: {
                    required : true,
                },
                 email: {
                    required : true,
                },
                 address: {
                    required : true,
                },
                 customer_image: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'নাম যুক্ত করুন',
                },
                mobile_no: {
                    required : 'মোবাইল যুক্ত করুন',
                },
                email: {
                    required : 'ইমেইল যুক্ত করুন',
                },
                address: {
                    required : 'ঠিকানা যুক্ত করুন',
                },
                 customer_image: {
                    required : 'ছবি যুক্ত করুন',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>


<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>



@endsection
