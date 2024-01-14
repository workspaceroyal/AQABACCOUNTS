@extends('user.admin_master')
@section('user')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">খরচ এপ্রুভ</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
    @php
    $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
<h4>খরচ নং: #{{ $invoice->invoice_no }} - {{ date('d-m-Y',strtotime($invoice->date)) }} </h4>
    <a href="{{ route('user.invoice.pending.list') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fa fa-list"> পেন্ডিং খরচের তালিকা </i></a> <br>  <br>

     <table class="table table-dark" width="100%">
        <tbody>
            <tr>
                <td><p> ব্যয়ের খাতের তথ্য </p></td>
                <td><p> নাম: <strong> {{ $payment['customer']['name']  }} </strong> </p></td>
                <td><p> মোবাইল: <strong> {{ $payment['customer']['mobile_no']  }} </strong> </p></td>
               <td><p> ইমাইল: <strong> {{ $payment['customer']['email']  }} </strong> </p></td>
            </tr>

             <tr>
             <td></td>
              <td colspan="3"><p> বিবরণ : <strong> {{ $invoice->description  }} </strong> </p></td>
             </tr>
        </tbody>

     </table>


     <form method="post" action="{{ route('user.approval.store',$invoice->id) }}">
      @csrf
         <table border="1" class="table table-dark" width="100%">
            <thead>
                <tr>
                    <th class="text-center">নং</th>
                    <th class="text-center">অর্থের খাত</th>
                    <th class="text-center">মাস ও সন</th>
                    <th class="text-center" style="background-color: #8B008B">বর্তমান তহবিল</th>
                    <th class="text-center">পরিমাণ</th>
                    <th class="text-center">পুনরাবৃত্তি</th>
                    <th class="text-center">মোট পরিমাণ</th>
                </tr>

            </thead>
    <tbody>
        @php
        $total_sum = '0';
        @endphp
        @foreach($invoice['invoice_details'] as $key => $details)
        <tr>

            <input type="hidden" name="category_id[]" value="{{ $details->category_id }}">
            <input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
            <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{ $details->selling_qty }}">

            <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $details['category']['name'] }}</td>
            <td class="text-center">{{ $details['product']['name'] }}</td>
            <td class="text-center" style="background-color: #8B008B">৳ {{ $details['product']['quantity'] }}</td>
            <td class="text-center">৳ {{ $details->selling_qty }}</td>
            <td class="text-center">{{ $details->unit_price }}</td>
            <td class="text-center"> ৳{{ $details->selling_price }}</td>
        </tr>
        @php
        $total_sum += $details->selling_price;
        @endphp
        @endforeach
        <tr>
            <td colspan="6"> মোট </td>
             <td > ৳ {{ $total_sum }} </td>
        </tr>
         {{-- <tr>
            <td colspan="6">Discount/Fine</td>
             <td > ৳ {{ $payment->discount_amount }} </td>
        </tr> --}}

         <tr>
            <td colspan="6"> পরিশোধনীয় পরিমাণ </td>
             <td > ৳ {{ $payment->paid_amount }} </td>
        </tr>

         <tr>
            <td colspan="6"> অগ্রিম পরিমাণ </td>
             <td > ৳ {{ $payment->due_amount }} </td>
        </tr>

        <tr>
            <td colspan="6"> সর্বমোট </td>
             <td > ৳ {{ $payment->total_amount }}</td>
        </tr>
    </tbody>

         </table>

         <button type="submit" class="btn btn-info">খরচ এপ্রুভ </button>

     </form>



                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection
