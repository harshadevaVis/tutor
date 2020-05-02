<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function viewComments(){
//        $comments = Unapprovedd:latest()->get();
        if (request()->ajax()) {
            $query = Comments::query();

//            if (!empty($request->company)) {
//                $query = $query->where('Company_To', $request->company);
//            }
//            if (!empty($request->endDate) && !empty($request->startDate)) {
//                $startDate = date('Y-m-d', strtotime($request['startDate']));
//                $endDate = date('Y-m-d', strtotime($request['endDate'].'+1 day'));
//
//                $query = $query->whereBetween("date",[$startDate,$endDate]);
//            }

            $Comments = $query->get();

            return datatables()->of($Comments)->addColumn('teacher', function (Comments $Comments) {
                if($Comments->teacher->displayName != null){
                    return $Comments->teacher->displayName;
                }
                else{
                    return $Comments->teacher->user->fName. ' '.$Comments->teacher->user->lName;

                }
            })->addColumn('status', function (Comments $Comments) {
                if($Comments->status == 1){
                    return 'APPROVED';
                }
                else{
                    return 'PENDING';

                }
            })->addColumn('commenter', function (Comments $Comments) {

                    return [$Comments->name,$Comments->email];

            })->addColumn('action', function (Comments $Comments) {
                if($Comments->status == 1){
                    return "<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">&nbsp;<button  onclick='deleteComment($Comments->idcomments)' class='btn btn-danger'><span class='fa fa-trash'></span> </button>
                            <button onclick='unApproveComment($Comments->idcomments)' class='btn btn-warning'><span class='fa fa-rotate-left (alias)'></span> </button></div>";
                }
                else{
                    return "<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">&nbsp;<button  onclick='deleteComment($Comments->idcomments)' class='btn btn-danger'><span class='fa fa-trash'></span></button>
                            <button onclick='approveComment($Comments->idcomments)' class='btn btn-success'><span class='fa fa-check'></span></button></div>";

                }
            })->make(true);

        }
        return view('admin.viewComments');
    }

    public function deleteComment(Request $request){
        $id = $request['id'];
        $comment = Comments::find(intval($id));
        $comment->delete();
    }

    public function unApproveComment(Request $request){
        $id = $request['id'];
        $comment = Comments::find(intval($id));
        $comment->status = 2;
        $comment->save();
    }

    public function approveComment(Request $request){
        $id = $request['id'];
        $comment = Comments::find(intval($id));
        $comment->status = 1;
        $comment->save();
    }
}
