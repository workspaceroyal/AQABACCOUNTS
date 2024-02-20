@extends('user.admin_master')
@section('user')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">তহবিল খাত এডিট</h4><br><br>



 <form method="post" action="{{ route('user.product.update') }}" id="myForm" >
                @csrf

                <input type="hidden" name="id" value="{{ $product->id }}">

            <div class="mb-3 row">
                <label for="example-text-input" class="col-sm-2 col-form-label">তহবিল খাত নাম </label>
                <div class="form-group col-sm-10">
                    <input name="name" value="{{ $product->name }}" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->


            <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">আয়ের উৎস </label>
        <div class="col-sm-10">
            <select name="supplier_id" class="form-select" aria-label="Default select example">
                <option selected="">একটি সিলেক্ট করুন</option>
                @foreach($supplier as $supp)
                <option value="{{ $supp->id }}" {{ $supp->id == $product->supplier_id ? 'selected' : '' }}   >{{ $supp->name }}</option>
               @endforeach
                </select>
        </div>
    </div>
  <!-- end row -->

      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">মুদ্রা </label>
        <div class="col-sm-10">
            <select name="unit_id" class="form-select" aria-label="Default select example">
                <option selected="">একটি সিলেক্ট করুন</option>
                @foreach($unit as $uni)
                <option value="{{ $uni->id }}" {{ $uni->id == $product->unit_id ? 'selected' : '' }} >{{ $uni->name }}</option>
               @endforeach
                </select>
        </div>
    </div>
  <!-- end row -->



      <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">অর্থের খাত </label>
        <div class="col-sm-10">
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option selected="">একটি সিলেক্ট করুন</option>
                @foreach($category as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
               @endforeach
                </select>
        </div>
    </div>
  <!-- end row -->


<input type="submit" class="btn btn-info waves-effect waves-light" value="আপডেট করুন">
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
                 supplier_id: {
                    required : true,
                },
                 unit_id: {
                    required : true,
                },
                 category_id: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'তহবিল খাত যুক্ত করুন',
                },
                supplier_id: {
                    required : 'আয়ের উৎস ্সিলেক্ট করুন',
                },
                unit_id: {
                    required : 'মুদ্রা সিলেক্ট করুন ',
                },
                category_id: {
                    required : 'অর্থের খাত সিলেক্ট করুন',
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



@endsection
