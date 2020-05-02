<?php

namespace App\Http\Controllers;

use App\City;
use App\Classes;
use App\TeacherCategory;
use App\TeacherCity;
use App\TeacherSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassesController extends Controller
{
    public function saveClass(Request $request){
        $rules = \Validator::make($request->all(), [
            'city' => 'required',
            'subject' => 'required|numeric',
            'category' => 'required|numeric',
            'institute' => 'required',
            'day' => 'required|numeric',
            'start' => 'required'

        ], [
            'city.required' => ' is required!',
            'subject.required' => ' is required!',
            'subject.numeric' => 'Invalid subject!',
            'category.required' => ' is required!',
            'institute.required' => ' is required!',
            'day.required' => ' is required!',
            'day.numeric' => 'Invalid day!',
            'category.numeric' => 'Invalid grade!',
            'start.required' => ' is required!'

        ]);

        if ($rules->fails()) {
            return response()->json(['errors' => $rules->errors()]);
        }

        $isCityExist = City::where('cityName',$request['city'])->first();
        if($isCityExist != null){
            $cityId  = $isCityExist->idcity;
        }
        else{
            $newCity = new City();
            $newCity->cityName = $request['city'];
            $newCity->status = 1;
            $newCity->save();

            $cityId = $newCity->idcity;
        }
        $class = new Classes();
        $class->city_idcity = $cityId;
        $class->subject_idsubject = $request['subject'];
        $class->category_idcategory = $request['category'];
        $class->iduser_master = Auth::user()->iduser_master;
        $class->institute = $request['institute'];
        $class->day = $request['day'];
        $class->startTime = $request['start'];
        $class->endTime = $request['end'];
        $class->status = 1;
        $class->save();

        if(TeacherCity::where('teacher_idteacher',Auth::user()->iduser_master)->where('city_idcity',$cityId)->where('status',1)->first() == null) {
            $teachCity = new TeacherCity();
            $teachCity->teacher_idteacher = Auth::user()->iduser_master;
            $teachCity->city_idcity = $cityId;
            $teachCity->status = 1;
            $teachCity->save();
        }

        if(TeacherSubject::where('teacher_idteacher',Auth::user()->iduser_master)->where('subject_idsubject',$request['subject'])->where('status',1)->first() == null) {
            $teachSubject = new TeacherSubject();
            $teachSubject->teacher_idteacher = Auth::user()->iduser_master;
            $teachSubject->subject_idsubject = $request['subject'];
            $teachSubject->status = 1;
            $teachSubject->save();
        }

        if(TeacherCategory::where('teacher_idteacher',Auth::user()->iduser_master)->where('category_idcategory',$request['category'])->where('status',1)->first() == null) {
            $teachCat = new TeacherCategory();
            $teachCat->teacher_idteacher = Auth::user()->iduser_master;
            $teachCat->category_idcategory = $request['category'];
            $teachCat->status = 1;
            $teachCat->save();
        }

        return response()->json(['success' => 'Class details saved.']);
    }

    public function showClasses(){
        $classes = Classes::where('iduser_master',Auth::user()->iduser_master)->where('status',1)->get();
//        $classes = Classes::where('teacher_idteacher',1)->where('status',1)->get();
        $tableData = "";
        if($classes != null){
            foreach ($classes as $class){
                $tableData .= "<tr>";
                $tableData .= "<td>".$class->subject->name."</td>";
                $tableData .= "<td>".$class->category->category."</td>";
                $tableData .= "<td>".$class->institute."</td>";
                if($class->day == 1){
                    $tableData .= "<td>MONDAY</td>";
                }
                else if($class->day == 2){
                    $tableData .= "<td>TUESDAY</td>";
                }
                else if($class->day == 3){
                    $tableData .= "<td>WEDNESDAY</td>";
                }
                else if($class->day == 4){
                    $tableData .= "<td>THURSDAY</td>";
                }
                else if($class->day == 5){
                    $tableData .= "<td>FRIDAY</td>";
                }
                else if($class->day == 6){
                    $tableData .= "<td>SATURDAY</td>";
                }
                else if($class->day == 7){
                    $tableData .= "<td>SUNDAY</td>";
                }
                else{
                    $tableData .= "<td>UNKNOWN</td>";

                }
                $tableData .= "<td>".$class->startTime."</td>";
                $tableData .= "<td>".$class->endTime."</td>";
                $tableData .= "<td>".$class->city->cityName."</td>";
                $tableData .= "</tr>";
            }

        }
        else{
            $tableData = "<tr><td style='text-align: center;' colspan='6'>No classes added yet</td></tr>";

        }
        return $tableData;
    }

}
