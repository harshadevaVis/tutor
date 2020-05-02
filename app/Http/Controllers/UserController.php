<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Subject;
use App\Teacher;
use App\User;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function signUpView(){
        return view('signup')->with([]);
    }

    public function saveUser(Request $request){

        $validator = Validator::make($request->all(), [
            'fNmae' => 'required|max:200',

            'lName' => 'required|max:200',

            'userType' => 'required|numeric',

            'email' => 'required|email|unique:user_master,email',

            'password' => 'required|min:6|confirmed'

        ], [
            'fNmae.required' => 'First name must be provided!',
            'fNmae.max' => 'First name must be less than 200 characters long!',

            'lName.required' => 'Last name must be provided!',
            'lName.max' => 'Last name must be less than 200 characters long!',

            'userType.required' => 'Please select your account type (Click on the image)!',
            'userType.numeric' => 'User type invalid!',

            'email.required' => 'Email must be provided!',
            'email.email' => 'Email format invalid!',
            'email.unique' => 'Email is already taken!',

            'password.required' => 'Password must be provided!',
            'password.min' => 'Password must be at least 6 characters long!',
            'password.confirmed' => 'Passwords did not match!',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $user->fName = $request['fNmae'];
        $user->lName = $request['lName'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->status = 1;
        if($request['userType'] ==  1 ){ // user type defines with front end input
            $type = 3;
        }
        else if($request['userType'] ==  2){ // user type defines with front end input
            $type = 4;
        }
        else if($request['userType'] ==  3) { // if front end input is not above user will become a student.The user which has minimum privileges.
            $type = 5;
        }
        else{
            return redirect()->back()->with('error','User type invalid.');
        }

        $user->user_role_iduser_role = $type;
        $user->save();

        return $this->authenticate($request);
    }

    public function login(){
        return view('login')->with([]);
    }

    public function authenticate(Request $request){
        $errors = new MessageBag(); // initiate MessageBag

        $credentials = [
            'email'     => \Illuminate\Support\Facades\Request::get('email'),
            'password'  => \Illuminate\Support\Facades\Request::get('password')
        ];

        if (Auth::attempt($credentials)) // use the inbuilt Auth::attempt method to log in the user ( if the credentials are wrong, this will fail )
            return Redirect::to(route('home'))->with('success', 'You are now logged in.'); // if the credentials were correct, Auth::attempt will log in the user automatically and you can redirect the user to the intended page. Moreover, using the ->with() method, you can store a message in a session, which can be accessed on the next page. (se explanation under)

        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]); // if Auth::attempt fails (wrong credentials) create a new message bag instance.

        return Redirect::back()->withErrors($errors)->withInput(\Illuminate\Support\Facades\Request::except('password')); // redirect back to the login page, using ->withErrors($errors) you send the error created above

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function myProfile(){
        $userId = Auth::user()->iduser_master;
//        $userId = 1;
        $categories = Category::where('status',1)->get();
        $subjects = Subject::where('status',1)->get();
        $cities = City::where('status',1)->get();
        return view('myProfile')->with(['userId'=>$userId,'categories'=>$categories,'subjects'=>$subjects,'cities'=>$cities]);
    }

    public function saveDashBoard(Request $request){
        $about = $request['aboutMe'];
        $skills = $request['skills'];
        $objective = $request['objective'];

        $profile = Teacher::where('user_master_iduser_master',Auth::user()->iduser_master)->first();// this will not check status : because deactivated account also editable for user
//        $profile = Teacher::where('user_master_iduser_master',1)->first();// this will not check status : because deactivated account also editable for user

        if($profile != null){
            $profile->about = $about;
            $profile->skills = $skills;
            $profile->objective = $objective;
            $profile->save();
        }
        else{
            $profile = new Teacher();
            $profile->user_master_iduser_master = Auth::user()->iduser_master;
//            $profile->user_master_iduser_master = 1;
            $profile->about = $about;
            $profile->skills = $skills;
            $profile->objective = $objective;
            $profile->save();
        }
    }

    public function saveContact(Request $request){
        $myWeb = $request['myWeb'];
        $showTel = $request['showTel'] == 'true' ? 1 : 0 ;
        $address2 = $request['address2'];
        $address1 = $request['address1'];

        $profile = Teacher::where('user_master_iduser_master',Auth::user()->iduser_master)->first();// this will not check status : because deactivated account also editable for user

        if($profile != null){
            $profile->web = $myWeb;
            $profile->showContact = $showTel;
            $profile->addressLine2 = $address2;
            $profile->addressLine1 = $address1;
            $profile->save();
        }
        else{
            $profile = new Teacher();
            $profile->user_master_iduser_master = Auth::user()->iduser_master;
            $profile->web = $myWeb;
            $profile->showContact = $showTel;
            $profile->addressLine2 = $address2;
            $profile->addressLine1 = $address1;
            $profile->save();
        }
        return response()->json(['success' => 'success']);

    }

    function confirmName(Request $request){
        $displayName = $request['displayName'];
        $teacher = Teacher::where('user_master_iduser_master',Auth::user()->iduser_master)->first();// this will not check status : because deactivated account also editable for user
//        $teacher = Teacher::where('user_master_iduser_master',1)->first();// this will not check status : because deactivated account also editable for user
        if($teacher != null) {
            $teacher->displayName = $displayName;
            $teacher->save();
        }
        else{
            $teacher =  new Teacher();
            $teacher->displayName = $displayName;
            $teacher->user_master_iduser_master = Auth::user()->iduser_master;
//            $teacher->user_master_iduser_master = 1;
            $teacher->save();
        }

    }

    function confirmTag(Request $request){
        $tanLine = $request['tagLine'];
        $teacher = Teacher::where('user_master_iduser_master',Auth::user()->iduser_master)->first();// this will not check status : because deactivated account also editable for user
//        $teacher = Teacher::where('user_master_iduser_master',1)->first();// this will not check status : because deactivated account also editable for user
        if($teacher != null) {
            $teacher->tagLIne = $tanLine;
            $teacher->save();
        }
        else{
            $teacher =  new Teacher();
            $teacher->tagLIne = $tanLine;
            $teacher->user_master_iduser_master = Auth::user()->iduser_master;
//            $teacher->user_master_iduser_master = 1;
            $teacher->save();
        }
    }

    function submitImage(Request $request){
        $image = $request->file('profileInput');
        $name = rand() . Auth::user()->idUser_Master . time() . '.' . $image->getClientOriginalExtension();
//        $name = rand() . 1 . time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('my_assets/images/profile');
        $image->move($path,$name);

        $teacher = Teacher::where('user_master_iduser_master',Auth::user()->iduser_master)->first();
//        $teacher = Teacher::where('user_master_iduser_master',1)->first();

        if($teacher != null) {
            Auth::user()->image = $name;
            Auth::user()->save();
        }
        else{
            Auth::user()->image = $name;
            Auth::user()->save();

            $teacher =  new Teacher();
            $teacher->user_master_iduser_master = Auth::user()->iduser_master;
//            $teacher->user_master_iduser_master = 1;
            $teacher->save();
        }
    }

    public function saveSocialMedia(Request $request){
        $link = $request['link'];
        $type = $request['type'];

        $teacher = Auth::user()->teacher;
        $teacher->$type = $link;
        $teacher->save();
    }


}
