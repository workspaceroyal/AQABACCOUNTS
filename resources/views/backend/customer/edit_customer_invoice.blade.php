@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">ব্যয়ের খাত রিপোর্ট এডিট</h4>

                                    <div class="page-title-right">
                                        <ol class="m-0 breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                            <li class="breadcrumb-item active">ব্যয়ের খাত রিপোর্ট এডিট</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">


  <a href="{{ route('credit.customer') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-list"> ব্যাক </i></a> <br>  <br>

    <div class="row">
        <div class="col-12">
            <div>
                <div class="p-2">
     <h3 class="font-size-16"><strong>ব্যয়ের খাত রিপোর্ট ( ব্যয় নং: #{{ $payment['invoice']['invoice_no'] }} ) </strong></h3>
                </div>
                <div class="">
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td><strong>নাম </strong></td>
            <td class="text-center"><strong>মোবাইল</strong></td>
            <td class="text-center"><strong>ঠিকানা</strong>
            </td>


        </tr>
        </thead>
        <tbody>
        <!-- foreach ($order->lineItems as $line) or some such thing here -->
        <tr>
            <td> {{ $payment['customer']['name'] }}</td>
            <td class="text-center">{{ $payment['customer']['mobile_no']  }}</td>
            <td class="text-center">{{ $payment['customer']['email']  }}</td>


        </tr>


                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>
    </div> <!-- end row -->





   <div class="row">
        <div class="col-12">

   <form method="post" action="{{ route('customer.update.invoice',$payment->invoice_id)}}">
          @csrf

            <div>
                <div class="p-2">

                </div>
                <div class="">
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td><strong>Sl </strong></td>
            <td class="text-center"><strong>আয়ের খাত</strong></td>
            <td class="text-center"><strong>মাস ও সন</strong>
            </td>
            <td class="text-center"><strong>বর্তমান তহবিল</strong>
            </td>
            <td class="text-center"><strong>পরিমাণ</strong>
            </td>
            <td class="text-center"><strong>পুনরাবৃত্তি</strong>
            </td>
            <td class="text-center"><strong>মোট পরিমাণ</strong>
            </td>

        </tr>
        </thead>
        <tbody>
        <!-- foreach ($order->lineItems as $line) or some such thing here -->

      @php
        $total_sum = '0';
$invoice_details = App\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();

        @endphp
        @foreach($invoice_details as $key => $details)
        <tr>
           <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $details['category']['name'] }}</td>
            <td class="text-center">{{ $details['product']['name'] }}</td>
            <td class="text-center">{{ $details['product']['quantity'] }}</td>
            <td class="text-center">{{ $details->selling_qty }}</td>
            <td class="text-center"> ৳ {{ $details->unit_price }}</td>
            <td class="text-center"> ৳ {{ $details->selling_price }}</td>

        </tr>
         @php
        $total_sum += $details->selling_price;
        @endphp
        @endforeach
            <tr>
                <td class="thick-line"></td>
                <td class="thick-line"></td>
                <td class="thick-line"></td>
                <td class="thick-line"></td>
                <td class="thick-line"></td>
                <td class="text-center thick-line">
                    <strong>মোট</strong></td>
                <td class="thick-line text-end"> ৳ {{ $total_sum }}</td>
            </tr>
            {{-- <tr>
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="text-center no-line">
                    <strong>Discount Amount</strong></td>
                <td class="no-line text-end"> ৳ {{ $payment->discount_amount }}</td>
            </tr> --}}
             <tr>
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="text-center no-line">
                    <strong>পরিশোধনীয় পরিমাণ</strong></td>
                <td class="no-line text-end">৳ {{ $payment->paid_amount }}</td>
            </tr>

             <tr>
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="text-center no-line">
                    <strong>অগ্রিম পরিমাণ</strong></td>
                    <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
                <td class="no-line text-end"> ৳ {{ $payment->due_amount }}</td>
            </tr>
            <tr>
                <td class="no-line"></td>
                 <td class="no-line"></td>
                  <td class="no-line"></td>
                   <td class="no-line"></td>
                <td class="no-line"></td>
                <td class="text-center no-line">
                    <strong>মোট পরিমাণ</strong></td>
                <td class="no-line text-end"><h4 class="m-0">৳ {{ $payment->total_amount }}</h4></td>
            </tr>
                            </tbody>
                        </table>
                    </div>




        <div class="row">

            <div class="form-group col-md-3">
                  <label>পরিশোধনীয় অবস্থা </label>
                    <select name="paid_status" id="paid_status" class="form-select">
                        <option value="">সিলেক্ট করুন </option>
                        <option value="full_paid">সম্পুর্ণ পরিশোধনীয় </option>
                        <option value="partial_paid">আংশিক পরিশোধনীয় </option>

                    </select>
        <input type="text" name="paid_amount" class="form-control paid_amount" placeholder="Enter Paid Amount" style="display:none;">
            </div>


            <div class="form-group col-md-3">
                <div class="md-3">
                <label for="example-text-input" class="form-label">তারিখ</label>
                 <input class="form-control example-date-input" placeholder="YYYY-MM-DD"  name="date" type="date"  id="date">
            </div>
            </div>

            <div class="form-group col-md-3">
                 <div class="md-3" style="padding-top: 30px;">
                <button type="submit" class="btn btn-info">আপডেট করুন</button>
            </div>

            </div>

        </div>





                </div>
            </div>
 </form>


        </div>
    </div> <!-- end row -->





</div>
</div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>


 <script type="text/javascript">
    $(document).on('change','#paid_status', function(){
        var paid_status = $(this).val();
        if (paid_status == 'partial_paid') {
            $('.paid_amount').show();
        }else{
            $('.paid_amount').hide();
        }
    });

</script>



@endsection
