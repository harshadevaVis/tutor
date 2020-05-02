<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class CommentController extends Controller
{
    public function saveComment(Request $request){
        $validator = \Validator::make($request->all(), [
            'teacherId' => 'required|numeric',

            'name' => 'required|max:200',

            'email' => 'required|email',

            'comment' => 'required',

        ], [
            'teacherId.required' => 'Teacher id is invalid!',
            'teacherId.numeric' => 'Teacher id is invalid!',

            'name.required' => 'Name must be provided!',
            'name.max' => 'Name must be less than 200 characters long!',

            'email.required' => 'Email must be provided!',
            'email.email' => 'Email format invalid!',

            'comment.confirmed' => 'Comment must be provided!',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $comment = new Comments();
        $comment->teacher_idteacher = $request['teacherId'];
        if(Auth::check()){
//            $comment->iduser_master = $request['teacherId'];
            $comment->iduser_master = Auth::user()->iduser_master;

        }
        else{
            $comment->iduser_master = null;

        }
        $comment->name = $request['name'];
        $comment->email = $request['email'];
        $comment->comment = $request['comment'];
        $comment->status = 2;
        $comment->save();

        return response()->json(['success' => 'success']);


    }

    public function loadComments(Request $request){
        $teacher = $request['teacher'];
       $comments = Comments::where('teacher_idteacher',intval($teacher))->where('status',1)->get();
       $tableData = "";
       if($comments != null) {
           foreach ($comments as $comment) {
               $tableData .= " <div class=\"comment_item d-flex flex-row align-items-start jutify-content-start\">";
               if ($comment->iduser_master != null && $comment->user->image != null) {

                   $tableData .= "   <div class=\"comment_image\"><div><img src=" . URL::asset('my_assets/images/profile/' . $comment->user->image . '') . " alt=\"\"></div></div>";

               } else {
                   $tableData .= "   <div class=\"comment_image\"><div><img src=" . URL::asset('my_assets/images/profile/default.jpg') . " alt=\"\"></div></div>";

               }
               $tableData .= "   <div class=\"comment_content\">
                                <div class=\"comment_title_container d-flex flex-row align-items-center justify-content-start\">
                                    <div class=\"comment_author\"><a href=\"#\">" . $comment->name . "</a></div>
                                    <div class=\"comment_rating\"><div class=\"rating_r rating_r_4\"><i></i><i></i><i></i><i></i><i></i></div></div>
                                    <div class=\"comment_time ml-auto\">" . $comment->created_at->format('d-M-Y') . "</div>
                                </div>
                                <div class=\"comment_text\">
                                    <p>" . $comment->comment . "</p>
                                </div>
                            </div>
                        </div>";
           }
       }

        return response()->json(['success' => $tableData]);

    }

    public function loadCommentsMy(Request $request){
        $teacher = Auth::user()->teacher->idteacher;
        $comments = Comments::where('teacher_idteacher',intval($teacher))->where('status',1)->get();
        $tableData = "";
        foreach ($comments as $comment ){
            $tableData .= " <div class=\"comment_item d-flex flex-row align-items-start jutify-content-start\">";
            if($comment->iduser_master != null && $comment->user->image != null){

                $tableData .= "   <div class=\"comment_image\"><div><img src=". URL::asset('my_assets/images/profile/'.$comment->user->image.'')." alt=\"\"></div></div>";

            }
            else{
                $tableData .= "   <div class=\"comment_image\"><div><img src=". URL::asset('my_assets/images/profile/default.jpg')." alt=\"\"></div></div>";

            }
            $tableData .= "   <div class=\"comment_content\">
                                <div class=\"comment_title_container d-flex flex-row align-items-center justify-content-start\">
                                    <div class=\"comment_author\"><a href=\"#\">".$comment->name."</a></div>
                                    <div class=\"comment_rating\"><div class=\"rating_r rating_r_4\"><i></i><i></i><i></i><i></i><i></i></div></div>
                                    <div class=\"comment_time ml-auto\">".$comment->created_at->format('d-M-Y')."</div>
                                </div>
                                <div class=\"comment_text\">
                                    <p>".$comment->comment."</p>
                                </div>
                            </div>
                        </div>";
        }

    }
}
