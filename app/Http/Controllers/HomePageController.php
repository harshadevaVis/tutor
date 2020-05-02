<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
   public function home(){
       $categories = Category::where('status',1)->get();
       $subjects = Subject::where('status',1)->get();
       return view('index')->with(['categories'=>$categories,'subjects'=>$subjects]);
   }

   public function returnToSearchPage(Request $request){
       $searchSubjects = $request['subjects'];
       $searchCategory = $request['category'];
       $searchCity = $request['city'];

       $categories = Category::where('status',1)->get();
       $subjects = Subject::where('status',1)->get();
       $query = Teacher::query();
       if($searchSubjects != null){
           $query->whereHas("teacherSubjects", function ($q) use ($searchSubjects) {
               $loop = 0;
               foreach ($searchSubjects as $searchSubject) {
                   if($loop == 0) {
                       $q->where('subject_idsubject', $searchSubjects[0]);
                   }else{
                       $q->orwhere('subject_idsubject', $searchSubject);

                   }
                   $loop++;
               }
           });
       }

       if($searchCategory != null){
           $query->whereHas("teacherCategory", function ($q) use ($searchCategory) {
               $q->where('category_idcategory', $searchCategory);
           });
       }
       if($searchCity != null){
           $query->whereHas("teacherCity", function ($q) use ($searchCity) {
               $q->whereHas('city', function ($qe) use ($searchCity) {
                   $qe->where('cityName','like', '%'.$searchCity.'%');
               });
           });
       }

       $teachers = $query->get();
       return view('search')->with(['teachers'=>$teachers,'categories'=>$categories,'subjects'=>$subjects]);

   }
}
