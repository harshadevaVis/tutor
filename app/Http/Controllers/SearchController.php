<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategorySubject;
use App\City;
use App\Classes;
use App\Comments;
use App\Subject;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SearchController extends Controller
{
    public function viewSearchPage(Request $request){

        if (request()->ajax()) {
            $searchSubjects = $request['subjects'];
            $searchCategory = $request['category'];
            $searchCity = $request['city'];
            $searchKeyword = $request['keyword'];

             $query = Classes::query();

             if($searchSubjects != null){
                     $query->orWhere(function ($query) use ($searchSubjects) {
                         $loop = 0;
                         foreach ($searchSubjects as $searchSubject) {
                             if($loop == 0) {
                                 $query->where('subject_idsubject', $searchSubjects[0]);
                             }else{
                                 $query->orwhere('subject_idsubject', $searchSubject);
                             }
                             $loop++;
                         }
                     });
                 }

                 if($searchCategory != null){
                     $query->where('category_idcategory', $searchCategory);
                 }
                if($searchCity != null){
                    $query->whereHas('city', function ($qe) use ($searchCity) {
                            $qe->where('cityName','like', '%'.$searchCity.'%');
                        });
                }

                 if($searchKeyword != null){
                     $query->whereHas('teacher', function ($qe) use ($searchKeyword) {
                            $qe->where('displayName','like', '%'.$searchKeyword.'%')->orWhereHas("user", function ($q) use ($searchKeyword) {
                                $q->where('fName', 'like', '%' . $searchKeyword . '%')->orWhere('lName', 'like', '%' . $searchKeyword . '%');
                            });
                     });
                 }

            $teachers = $query->get()->groupBy('iduser_master');

             $profiles  = "";
             if($teachers != null) {
                 foreach ($teachers as $key=>$value) {
                     $profiles .= "   <div class=\"col-lg-4 col-md-6  mt-5  mt-md-0 profileContainer\">
                                <div class=\"card m-b-20 profile \">
                                    <div class=\"card-body\">

                                        <a href=" . route('viewProfile', ['teacher' => User::find(intval($key))->teacher->idteacher]) . ">";
                     if (User::find(intval($key))->image != null) {
                         $profiles .= "<img class='profilePic' src=" . URL::asset('my_assets/images/profile/' . User::find(intval($key))->image . '') . " >";
                     } else {
                         $profiles .= "<img class='profilePic' src=" . URL::asset('my_assets/images/profile/default.jpg') . " >";

                     }
                     if (User::find(intval($key))->teacher->displayName != null) {
                         $profiles .= "  <div class=\"team_title\"><a href=\"#\">" . User::find(intval($key))->teacher->displayName . "</a></div>";

                     } else {
                         $profiles .= "  <div class=\"team_title\"><a href=\"#\">" . User::find(intval($key))->fName . " " . User::find(intval($key))->lName . "</a></div>";


                     }
                     if (User::find(intval($key))->teacher->tagLIne != null) {
                         $profiles .= "  <div class=\"team_subtitle\">" . User::find(intval($key))->teacher->tagLIne . "</div>";

                     } else {
                         $profiles .= "  <div class=\"team_subtitle\">&nbsp;</div>";

                     }

                     $profiles .= "</a>
                                        <div class='social_list'>
                                            <ul>";
                     if (User::find(intval($key))->teacher->facebook != null) {
                         $profiles .= "<li><a href='" . User::find(intval($key))->teacher->facebook . "'><i class='fa fa-facebook' aria-hidden='true'></i></a></li>";
                     }
                     if (User::find(intval($key))->teacher->twitter != null) {
                         $profiles .= "<li><a href='" . User::find(intval($key))->teacher->twitter . "'><i class='fa fa-twitter' aria-hidden='true'></i></a></li>";
                     }
                     if (User::find(intval($key))->teacher->linkedin != null) {
                         $profiles .= "<li><a href='" . User::find(intval($key))->teacher->linkedin . "'><i class='fa fa-google-plus ' aria-hidden='true'></i></a></li>";
                     }

                     $profiles .= "    </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                 }
             }
            return response()->json(['success' => $profiles]);


        };
        $categories = Category::where('status',1)->get();
        $subjects = Subject::where('status',1)->get();
        $query = Teacher::query();

        $teachers = $query->get();
        return view('search')->with(['teachers'=>$teachers,'categories'=>$categories,'subjects'=>$subjects]);
    }

    public function getSearchResult(Request $request){
        $city = new City();
        $city->cityName = $request['city'];
        $city->status = 1;
        $city->save();
    }


    /**
     * categoryChange
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * method accessed by index and myProfile
     * Will return subjects belongs to given category
     */
    public function categoryChange(Request $request){
        $cat = $request['cat'];
        $optionData = "";


        if($cat != null){
            $subjects = CategorySubject::where('category_idcategory',intval($cat))->where('status',1)->select('subject_idsubject')->distinct()->get();
            if($subjects != null) {
                foreach ($subjects as $subject) {
                    $optionData .= " <option value=" . $subject->subject->idsubject . ">" . $subject->subject->name . "</option>";
                }

            }
            else
            {
                $optionData .= " <option disabled selected value=''>No subject in this category.</option>";
            }
        }
        else{

            $subjects = Subject::where('status',1)->get();
            if($subjects != null) {
                foreach ($subjects as $subject) {
                    $optionData .= " <option value=" . $subject->idsubject . ">" . $subject->name . "</option>";
                }

            }
            else
            {
                $optionData .= " <option disabled selected value=''>No subject in this category.</option>";
            }
        }


        return response()->json(['success' => $optionData]);
    }

    public function viewProfile(Request $request){
        $userId = Teacher::find(intval($request['teacher']))->user->iduser_master;
        $comments = Comments::where('teacher_idteacher',$request['teacher'])->where('status',1)->get();
        $classes  = Classes::where('status',1)->where('iduser_master',intval($userId))->get();
        return view('viewProfile')->with(['comments'=>$comments,'teacher'=>$request['teacher'],'classes'=>$classes]);
    }
}
