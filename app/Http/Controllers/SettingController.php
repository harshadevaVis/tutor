<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategorySubject;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function addCategory(){
        $subjects = Subject::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        return view('addCategory')->with(['subjects'=>$subjects,'categories'=>$categories]);
    }

    public function saveCategory(Request $request){
        $rules = \Validator::make($request->all(), [
            'cat' => 'required',
        ], [
            'cat.required' => 'Category name is required!',
        ]);

        if ($rules->fails()) {
            return response()->json(['errors' => $rules->errors()]);
        }


        $isExit = Category::where('category',$request['cat'])->where('status',1)->first();

        if($isExit == null) {
            $cat = new Category();
            $cat->category = $request['cat'];
            $cat->iduser_master = Auth::user()->iduser_master;
            if(Auth::user()->Meta_User_Role == 1) {
                $cat->status = 1;
            }
            else{
                $cat->status = 2;

            }
            $cat->save();
        }
        else{
            return response()->json(['errors' => ['exist'=>'Category already exist.']]);
        }

//        foreach ($request['subjects'] as $subject){
//            $new = new CategorySubject();
//            $new->category_idcategory = $cat->idcategory;
//            $new->subject_idsubject = $subject;
//            $new->status = 1;
//            $new->save();
//        }
        return response()->json(['success' => 'Success']);

    }

    public function saveSubject(Request $request){
        $rules = \Validator::make($request->all(), [
            'subject' => 'required',
        ], [
            'subject.required' => 'Subject name is required!',
        ]);

        if ($rules->fails()) {
            return response()->json(['errors' => $rules->errors()]);
        }

        $isExist  = Subject::where('status',1)->where('name',$request['subject'])->first();

        if($isExist == null) {
            $sub = new Subject();
            $sub->name = $request['subject'];
            $sub->iduser_master = Auth::user()->iduser_master;
            if(Auth::user()->Meta_User_Role == 1) {
                $sub->status = 1;
            }
            else{
                $sub->status = 2;

            }
            $sub->save();
        }
        else{
            return response()->json(['errors' => ['exist'=>'Subject already exist.']]);

        }

//        $new = new CategorySubject();
//        $new->category_idcategory = $request['cat'];
//        $new->subject_idsubject = $sub->idsubject;
//        $new->status = 1;
//        $new->save();
        return response()->json(['success' => 'Success']);

    }

    public function saveMapping(Request $request){
        $rules = \Validator::make($request->all(), [
            'cat' => 'required',
        ], [
            'cat.required' => 'Category name is required!',
        ]);

        if ($rules->fails()) {
            return response()->json(['errors' => $rules->errors()]);
        }

        if($request['subjects'] != null){
            foreach ($request['subjects'] as $subject) {
                if (CategorySubject::where('category_idcategory', $request['cat'])->where('subject_idsubject', $subject)->first() == null) {
                    $new = new CategorySubject();
                    $new->category_idcategory = $request['cat'];
                    $new->subject_idsubject = $subject;
                    $new->iduser_master = Auth::user()->iduser_master;
                    if(Auth::user()->Meta_User_Role == 1) {
                        $new->status = 1;
                    }
                    else{
                        $new->status = 2;

                    }
                    $new->save();
                }
            }

            return response()->json(['success' => 'Success']);
        }
        else{
            return response()->json(['errors' =>['error'=>'Subjects must be provided!']]);

        }


    }

    public function loadCatAndSub(){
        $cats = Category::where(function ($query) {
            $query->where('status',1);
        })->orWhere(function ($query) {
            $query->where('status',2)->where('iduser_master', Auth::user()->iduser_master);
        })->get();
        $catOptions = "<option value=''>Choose category..</option>";
        foreach ($cats as $cat){
            $catOptions .= "<option value=".$cat->idcategory.">".$cat->category."</option>";
        }

        $subs = Subject::where(function ($query) {
            $query->where('status',1);
        })->orWhere(function ($query) {
            $query->where('status',2)->where('iduser_master', Auth::user()->iduser_master);
        })->get();
        $subOptions = "";
        foreach ($subs as $sub){
            $subOptions .= "<option value=".$sub->idsubject.">".$sub->name."</option>";
        }

        return response()->json(['cat' =>$catOptions,'sub'=>$subOptions]);

    }

}
