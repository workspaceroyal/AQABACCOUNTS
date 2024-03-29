<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Auth;
use Illuminate\Support\Carbon;

class UnitController extends Controller
{
     public function UnitAll(){

        $units = Unit::latest()->get();
        return view('backend.unit.unit_all',compact('units'));
    } // End Method


    public function UnitAdd(){
        return view('backend.unit.unit_add');
    } // End Method



     public function UnitStore(Request $request){

        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'মুদ্রা সফল ভাবে ইনসার্ট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);

    } // End Method


    public function UnitEdit($id){

          $unit = Unit::findOrFail($id);
        return view('backend.unit.unit_edit',compact('unit'));

    }// End Method


    public function UnitUpdate(Request $request){

        $unit_id = $request->id;

        Unit::findOrFail($unit_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'মুদ্রা সফল ভাবে আপডেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);

    }// End Method


    public function UnitDelete($id){

          Unit::findOrFail($id)->delete();

       $notification = array(
            'message' => 'মুদ্রা সফল ভাবে ডিলেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method



    public function UserUnitAll(){

        $units = Unit::latest()->get();
        return view('userbackend.unit.unit_all',compact('units'));
    } // End Method


    public function UserUnitAdd(){
        return view('userbackend.unit.unit_add');
    } // End Method



     public function UserUnitStore(Request $request){

        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'মুদ্রা সফল ভাবে ইনসার্ট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('user.unit.all')->with($notification);

    } // End Method


    public function UserUnitEdit($id){

          $unit = Unit::findOrFail($id);
        return view('userbackend.unit.unit_edit',compact('unit'));

    }// End Method


    public function UserUnitUpdate(Request $request){

        $unit_id = $request->id;

        Unit::findOrFail($unit_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'মুদ্রা সফল ভাবে আপডেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('user.unit.all')->with($notification);

    }// End Method


    public function UserUnitDelete($id){

          Unit::findOrFail($id)->delete();

       $notification = array(
            'message' => 'মুদ্রা সফল ভাবে ডিলেট হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method



}
