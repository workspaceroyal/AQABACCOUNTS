<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Auth;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function SupplierAll(){
        // $suppliers = Supplier::all();
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all',compact('suppliers'));
    } // End Method


    public function SupplierAdd(){
     return view('backend.supplier.supplier_add');
    } // End Method


    public function SupplierStore(Request $request){

        Supplier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'আয়ের উৎস সফল ভাবে ইনসার্ট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);

    } // End Method


    public function SupplierEdit($id){

        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit',compact('supplier'));

    } // End Method

    public function SupplierUpdate(Request $request){

        $sullier_id = $request->id;

        Supplier::findOrFail($sullier_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'আয়ের উৎস সফল ভাবে আপডেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);

    } // End Method


    public function SupplierDelete($id){

      Supplier::findOrFail($id)->delete();

       $notification = array(
            'message' => 'আয়ের উৎস সফল ভাবে ্ডিলেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    public function UserSupplierAll(){
        // $suppliers = Supplier::all();
        $suppliers = Supplier::latest()->get();
        return view('userbackend.supplier.supplier_all',compact('suppliers'));
    } // End Method


    public function UserSupplierAdd(){
     return view('userbackend.supplier.supplier_add');
    } // End Method


    public function UserSupplierStore(Request $request){

        Supplier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'আয়ের উৎস সফল ভাবে ইনসার্ট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('user.supplier.all')->with($notification);

    } // End Method


    public function UserSupplierEdit($id){

        $supplier = Supplier::findOrFail($id);
        return view('userbackend.supplier.supplier_edit',compact('supplier'));

    } // End Method

    public function UserSupplierUpdate(Request $request){

        $sullier_id = $request->id;

        Supplier::findOrFail($sullier_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'আয়ের উৎস সফল ভাবে আপডেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('user.supplier.all')->with($notification);

    } // End Method


    public function UserSupplierDelete($id){

      Supplier::findOrFail($id)->delete();

       $notification = array(
            'message' => 'আয়ের উৎস সফল ভাবে ্ডিলেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


}
