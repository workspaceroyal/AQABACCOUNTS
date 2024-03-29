<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;
use Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function ProductAll(){

        $product = Product::latest()->get();
        return view('backend.product.product_all',compact('product'));

    } // End Method


    public function ProductAdd(){

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('backend.product.product_add',compact('supplier','category','unit'));
    } // End Method


    public function ProductStore(Request $request){

        Product::insert([

            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'তহবিল খাত সফল ভাবে ইনসার্ট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);

    } // End Method



    public function ProductEdit($id){

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('product','supplier','category','unit'));
    } // End Method



    public function ProductUpdate(Request $request){

        $product_id = $request->id;

         Product::findOrFail($product_id)->update([

            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'তহবিল খাত সফল ভাবে আপডেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);


    } // End Method


    public function ProductDelete($id){

       Product::findOrFail($id)->delete();
            $notification = array(
            'message' => 'তহবিল খাত সফল ভাবে ডিলেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    public function UserProductAll(){

        $product = Product::latest()->get();
        return view('userbackend.product.product_all',compact('product'));

    } // End Method


    public function UserProductAdd(){

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        return view('userbackend.product.product_add',compact('supplier','category','unit'));
    } // End Method


    public function UserProductStore(Request $request){

        Product::insert([

            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'quantity' => '0',
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'তহবিল খাত সফল ভাবে ইনসার্ট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('user.product.all')->with($notification);

    } // End Method



    public function UserProductEdit($id){

        $supplier = Supplier::all();
        $category = Category::all();
        $unit = Unit::all();
        $product = Product::findOrFail($id);
        return view('userbackend.product.product_edit',compact('product','supplier','category','unit'));
    } // End Method



    public function UserProductUpdate(Request $request){

        $product_id = $request->id;

         Product::findOrFail($product_id)->update([

            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'তহবিল খাত সফল ভাবে আপডেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('user.product.all')->with($notification);


    } // End Method


    public function UserProductDelete($id){

       Product::findOrFail($id)->delete();
            $notification = array(
            'message' => 'তহবিল খাত সফল ভাবে ডিলেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method



}
