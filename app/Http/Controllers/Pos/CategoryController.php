<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class CategoryController extends Controller
{
    public function CategoryAll(){

        $categoris = Category::latest()->get();
        return view('backend.category.category_all',compact('categoris'));

    } // End Mehtod

    public function CategoryAdd(){
     return view('backend.category.category_add');
    } // End Mehtod


    public function CategoryStore(Request $request){

        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'অর্থের খাত সফলভাবে ইনসার্ট করা হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);

    } // End Method

     public function CategoryEdit($id){

          $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));

    }// End Method


     public function CategoryUpdate(Request $request){

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'অর্থের খাত সফলভাবে আপডেট করা হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);

    }// End Method


    public function CategoryDelete($id){

          Category::findOrFail($id)->delete();

       $notification = array(
            'message' => 'অর্থের খাত ডিলেট ইনসার্ট করা হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


    public function UserCategoryAll(){

        $categoris = Category::latest()->get();
        return view('userbackend.category.category_all',compact('categoris'));

    } // End Mehtod

    public function UserCategoryAdd(){
     return view('userbackend.category.category_add');
    } // End Mehtod


    public function UserCategoryStore(Request $request){

        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'অর্থের খাত সফলভাবে ইনসার্ট করা হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('user.category.all')->with($notification);

    } // End Method

     public function UserCategoryEdit($id){

          $category = Category::findOrFail($id);
        return view('userbackend.category.category_edit',compact('category'));

    }// End Method


     public function UserCategoryUpdate(Request $request){

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'অর্থের খাত সফলভাবে আপডেট করা হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->route('user.category.all')->with($notification);

    }// End Method


    public function UserCategoryDelete($id){

          Category::findOrFail($id)->delete();

       $notification = array(
            'message' => 'অর্থের খাত ডিলেট ইনসার্ট করা হয়েছে',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method


}
