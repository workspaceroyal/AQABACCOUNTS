@extends('user.admin_master')
@section('user')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">খরচ যুক্ত করুন </h4><br><br>


    <div class="row">

         <div class="col-md-1">
            <div class="md-3">
                <label for="example-text-input" class="form-label">খরচ নং</label>
                <input class="form-control example-date-input" name="invoice_no" type="text"  id="invoice_no" value="{{ $invoice_no }}" style="background-color:#ddd" >

            </div>
        </div>


        <div class="col-md-2">
            <div class="md-3">
                <label for="example-text-input" class="form-label">তারিখ</label>
                 <input class="form-control example-date-input" value="{{ $date }}" name="date" type="date"  id="date">
            </div>
        </div>


       <div class="col-md-3">
            <div class="md-3">
                <label for="example-text-input" class="form-label">অর্থের উৎস</label>
                <select name="category_id" id="category_id" class="form-select select2" aria-label="Default select example">
                <option selected="">একটি সিলেক্ট করুন </option>
                  @foreach($category as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
               @endforeach
                </select>
            </div>
        </div>


         <div class="col-md-3">
            <div class="md-3">
                <label for="example-text-input" class="form-label">তহবিল খাত</label>
                <select name="product_id" id="product_id" class="form-select select2" aria-label="Default select example">
                <option selected="">একটি সিলেক্ট করুন</option>

                </select>
            </div>
        </div>


           <div class="col-md-1">
            <div class="md-3">
                <label for="example-text-input" class="form-label">তহবিল(পরিমাণ)</label>
                 <input class="form-control example-date-input" name="current_stock_qty" type="text"  id="current_stock_qty" readonly style="background-color:#ddd" >
            </div>
        </div>


<div class="col-md-2">
    <div class="md-3">
        <label for="example-text-input" class="form-label" style="margin-top:43px;">  </label>


        <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore"> যুক্ত করুন</i>
    </div>
</div>





    </div> <!-- // end row  -->

        </div> <!-- End card-body -->
<!--  ---------------------------------- -->

        <div class="card-body">
        <form method="post" action="{{ route('user.invoice.store') }}">
            @csrf
            <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                <thead>
                    <tr>
                        <th>অর্থের উৎস</th>
                        <th>তহবিল খাত</th>
                        <th width="7%">পরিমাণ</th>
                        <th width="10%">পুনরাবৃত্তি</th>
                        <th width="15%">মোট পরিমাণ</th>
                        <th width="7%">একশন</th>

                    </tr>
                </thead>

                <tbody id="addRow" class="addRow">

                </tbody>

                <tbody>

                    <tr>
                        <td name="discount_amount" id="discount_amount"> </td>
                    </tr>
        {{-- <tr>
            <td colspan="4">Discount/Fine</td>
            <td>
            <input type="text" name="discount_amount" id="discount_amount" class="form-control estimated_amount" placeholder="Discount/Fine"  >
            </td>
        </tr> --}}


                    <tr>
                        <td colspan="4"> সর্বমোট</td>
                        <td>
                            <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;" >
                        </td>
                        <td></td>
                    </tr>

                </tbody>
            </table><br>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <textarea name="description" class="form-control" id="description" placeholder="এখানে বিবরণ লিখুন"></textarea>
                </div>
            </div><br>

            <div class="row">
                <div class="form-group col-md-3">
                    <label> পরিশোধনীয় পরিস্থিতি </label>
                    <select name="paid_status" id="paid_status" class="form-select">
                        <option value="">সিলেক্ট করুন </option>
                        <option value="full_paid">সম্পুর্ণ পরিশোধনীয় </option>
                        <option value="full_due">সম্পুর্ণ অগ্রিম </option>
                         <option value="partial_paid">আংশিক পরিশোধনীয় </option>

                    </select>
        <input type="text" name="paid_amount" class="form-control paid_amount" placeholder="নগদ পরিমাণ লিখুন" style="display:none;">
                </div>


            <div class="form-group col-md-9">
                <label> ব্যয়ের খাত  </label>
                    <select name="customer_id" id="customer_id" class="form-select">
                        <option value="">ব্যয়ের খাত সিলেক্ট করুন </option>
                        @foreach($costomer as $cust)
                        <option value="{{ $cust->id }}">{{ $cust->name }} - {{ $cust->mobile_no }}</option>
                        @endforeach
                         <option value="0">নতুন ব্যয়ের খাত</option>
                    </select>
            </div>
            </div> <!-- // end row --> <br>

<!-- Hide Add Customer Form -->
<div class="row new_customer" style="display:none">
    <div class="form-group col-md-4">
        <input type="text" name="name" id="name" class="form-control" placeholder="ব্যায়ের খাতের নাম লিখুন">
    </div>

    <div class="form-group col-md-4">
        <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="ব্যায়ের খাতের ্মোবাইল নাম্বার লিখুন">
    </div>

    <div class="form-group col-md-4">
        <input type="email" name="email" id="email" class="form-control" placeholder="ব্যায়ের খাতের ইমেইল লিখুন">
    </div>
</div>
<!-- End Hide Add Customer Form -->

 <br>
            <div class="form-group">
                <button type="submit" class="btn btn-info" id="storeButton"> সংরক্ষণ করুন</button>

            </div>

        </form>






        </div> <!-- End card-body -->







    </div>
</div> <!-- end col -->
</div>



</div>
</div>




<script id="document-template" type="text/x-handlebars-template">

<tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date" value="@{{date}}">
        <input type="hidden" name="invoice_no" value="@{{invoice_no}}">


    <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{ category_name }}
    </td>

     <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{ product_name }}
    </td>

     <td>
        <input type="number" min="1" class="text-right form-control selling_qty" name="selling_qty[]" value="">
    </td>

    <td>
        <input type="number" class="text-right form-control unit_price" name="unit_price[]" value="">
    </td>



     <td>
        <input type="number" class="text-right form-control selling_price" name="selling_price[]" value="0" readonly>
    </td>

     <td>
        <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
    </td>

    </tr>

</script>


<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click",".addeventmore", function(){
            var date = $('#date').val();
            var invoice_no = $('#invoice_no').val();
            var category_id  = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();


            if(date == ''){
                $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }

                  if(category_id == ''){
                $.notify("Category is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(product_id == ''){
                $.notify("Product Field is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }


                 var source = $("#document-template").html();
                 var tamplate = Handlebars.compile(source);
                 var data = {
                    date:date,
                    invoice_no:invoice_no,
                    category_id:category_id,
                    category_name:category_name,
                    product_id:product_id,
                    product_name:product_name

                 };
                 var html = tamplate(data);
                 $("#addRow").append(html);
        });

        $(document).on("click",".removeeventmore",function(event){
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });

        $(document).on('keyup click','.unit_price,.selling_qty', function(){
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.selling_qty").val();
            var total =qty;
            $(this).closest("tr").find("input.selling_price").val(total);
            $('#discount_amount').trigger('keyup');
        });

        $(document).on('keyup','#discount_amount',function(){
            totalAmountPrice();
        });

        // Calculate sum of amout in invoice

        function totalAmountPrice(){
            var sum = 0;
            $(".selling_price").each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length != 0){
                    sum += parseFloat(value);
                }
            });

            var discount_amount = parseFloat($('#discount_amount').val());
            if(!isNaN(discount_amount) && discount_amount.length != 0){
                    sum -= parseFloat(discount_amount);
                }

            $('#estimated_amount').val(sum);
        }

    });


</script>


<script type="text/javascript">
    $(function(){
        $(document).on('change','#category_id',function(){
            var category_id = $(this).val();
            $.ajax({
                url:"{{ route('get-product') }}",
                type: "GET",
                data:{category_id:category_id},
                success:function(data){
                    var html = '<option value="">সিলেক্ট করুন</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.name+'</option>';
                    });
                    $('#product_id').html(html);
                }
            })
        });
    });

</script>

 <script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{ route('check-product-stock') }}",
                type: "GET",
                data:{product_id:product_id},
                success:function(data){
                    $('#current_stock_qty').val(data);
                }
            });
        });
    });

</script>


<script type="text/javascript">
    $(document).on('change','#paid_status', function(){
        var paid_status = $(this).val();
        if (paid_status == 'partial_paid') {
            $('.paid_amount').show();
        }else{
            $('.paid_amount').hide();
        }
    });

      $(document).on('change','#customer_id', function(){
        var customer_id = $(this).val();
        if (customer_id == '0') {
            $('.new_customer').show();
        }else{
            $('.new_customer').hide();
        }
    });


</script>





@endsection
