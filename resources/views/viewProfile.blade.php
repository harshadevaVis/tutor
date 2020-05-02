@extends('layouts.main')
@section('customLinks')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('my_assets/styles/blog_single.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('my_assets/styles/blog_single_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('my_assets/styles/courses.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('my_assets/styles/courses_responsive.css')}}">
    <style rel="stylesheet" type="text/css">

        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .cover {
                background-image: url({{ URL::asset('my_assets/images/cover.jpg')}});
                width: 100%;
                height: 50%;
                /* Center and scale the image nicely */
                background-position: center;
                /*background-repeat: no-repeat;*/
                background-size: cover;

                position: absolute;
            }
            .profilePic{
                border-radius: 100%;
                margin-bottom: 2%;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {


        }

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {


        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .cover{
                background-image: url({{ URL::asset('my_assets/images/cover.jpg')}});

                /* Full height */
                width: 100%;
                height: 50%;
                /* Center and scale the image nicely */
                background-position: center;
                /*background-repeat: no-repeat;*/
                background-size: cover;

                position: absolute;

            }
            .profilePic{
                border-radius: 100%;
                margin-top: 25%;
            }
            .nameClause{
                color: #000000;
                margin-left: 5%;
            }
            .nameContainer{
                margin-top: 17%;
                /*margin-left: 10px;*/
                /*position: absolute;*/
            }



        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {


        }

        /*Social media icons start*/
        .socialWrapper{
            text-align: center;
            margin-bottom: 15px ;
        }
        .socialWrapper:active{
            text-align: center;
            margin-bottom: 15px ;
            transform: scale(0.8);
        }

        .social{
            font-size: 15px;
            padding: 10px 17px 10px ;
            text-align: center;
            text-decoration: none;
            border-radius: 50%;
            -webkit-box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.75);
            box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.75);

        }

        .social:hover {
            opacity: 0.7;

        }
        .socialWrapper .fa-facebook {
            background: #3B5998;
            color: white;
        }
        .socialWrapper .fa-whatsapp {
            background: #27cb28;
            color: white;
        }
        .socialWrapper .fa-viber {
            background: #665cac;
            color: white;
            padding-right: 15px;
        }
        .socialWrapper .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .socialWrapper .fa-google {
            background: #dd4b39;
            color: white;
        }

        .socialWrapper .fa-linkedin {
            background: #007bb5;
            color: white;
        }

        .socialWrapper .fa-youtube {
            background: #bb0000;
            color: white;
        }

        .socialWrapper .fa-instagram {
            background: #d6249f;
            background: radial-gradient(circle at 5% 90%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
            color: #fff;
        }

        .socialWrapper .fa-pinterest {
            background: #cb2027;
            color: white;
        }

        .socialWrapper .fa-snapchat-ghost {
            background: #fffc00;
            color: white;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        .socialWrapper .fa-skype {
            background: #00aff0;
            color: white;
        }

        .socialWrapper .fa-dribbble {
            background: #ea4c89;
            color: white;
        }

        .socialWrapper .fa-vimeo {
            background: #45bbff;
            color: white;
        }

        .socialWrapper .fa-tumblr {
            background: #2c4762;
            color: white;
        }

        .socialWrapper .fa-vine {
            background: #00b489;
            color: white;
        }

        .socialWrapper .fa-foursquare {
            background: #45bbff;
            color: white;
        }

        .socialWrapper .fa-stumbleupon {
            background: #eb4924;
            color: white;
        }

        .socialWrapper .fa-flickr {
            background: #f40083;
            color: white;
        }

        .socialWrapper .fa-yahoo {
            background: #430297;
            color: white;
        }

        .socialWrapper .fa-soundcloud {
            background: #ff5500;
            color: white;
        }

        .socialWrapper .fa-reddit {
            background: #ff5700;
            color: white;
        }

        /*Social media icons end*/

        p a {
            border-bottom: none;
        }

        p a:hover, p a:active {
            color: #09d4d7;
            background-color: rgba(12, 84, 96, 0);
        }
        .mediaContent p {
            margin-left: 37px;
        }

    </style>
@endsection
        @section('pageSpecificContent')
            <div class="container">


        <div class="row "> <!-- profile pic with cover start -->
            <div class="cover"></div>
            <div class="col-md-3 col-sm-12 text-center ">
                @if(\App\Teacher::find(intval($teacher))->user->image != null)
                    <img id="profilePic" class="profilePic" alt="Display image" width="260px" height="260px" src="{{ URL::asset('my_assets/images/profile/'.\App\Teacher::find(intval($teacher))->user->image.'')}}">
                @else
                    <img id="profilePic" class="profilePic" alt="Display image" width="260px" height="260px" src="{{ URL::asset('my_assets/images/profile/default.jpg')}}">

                @endif
            </div>

            <div class="col-md-9 col-sm-12 nameContainer">
                @if(\App\Teacher::find(intval($teacher))->displayName != null)
                    <h2 class="nameClause">{{App\Teacher::find(intval($teacher))->displayName}}</h2>
                @else
                    <h2 class="nameClause">{{App\Teacher::find(intval($teacher))->user->fName.' '.App\Teacher::find(intval($teacher))->user->lName}}</h2>

                @endif
                @if(App\Teacher::find(intval($teacher))->tagLIne != null)
                    <p class="nameClause"><i>{{App\Teacher::find(intval($teacher))->tagLIne}}</i></p>
                @endif
            </div>
        </div> <!-- profile pic with cover end -->


            <br/>

            <div class="row">
                <div class="col-md-10"> <!-- content start -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#dashboard" class="nav-link active" data-toggle="tab">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="#classes" class="nav-link" data-toggle="tab">Classes</a>
                        </li>
                        <li class="nav-item">
                            <a href="#reviews" class="nav-link" data-toggle="tab">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link" data-toggle="tab">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="dashboard">
                            @if(App\Teacher::find(intval($teacher))->about != null)
                                <div class="row">
                                    <div class="col-md-12 mediaContent">
                                        <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span> About me</h4>
                                        <p>{{App\Teacher::find(intval($teacher))->about}}</div>
                                </div>
                            @endif
                            @if(App\Teacher::find(intval($teacher))->skills != null)
                                <div class="row">
                                    <div class="col-md-12 mediaContent">
                                        <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                            Skills</h4>
                                        <p>{{App\Teacher::find(intval($teacher))->skills}}</div>
                                </div>
                            @endif
                            @if(App\Teacher::find(intval($teacher))->objective != null)
                                <div class="row">
                                    <div class="col-md-12 mediaContent">
                                        <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                            My Objective</h4>
                                        <p>{{App\Teacher::find(intval($teacher))->objective}}</div>
                                </div>
                            @endif

                        </div>
                        <div class="tab-pane fade" id="classes">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                        Classes</h4>

                                    <div class="form-group">
                                        <input  autocomplete="=off" type="text" class="form-control" name="liveSearch" id="liveSearch" placeholder="Looking for something in the table. . ."/>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>

                                                <th>SUBJECT</th>
                                                <th>CATEGORY</th>
                                                <th>INSTITUTE</th>
                                                <th>DAY</th>
                                                <th>START AT</th>
                                                <th>END AT</th>
                                                <th>CITY</th>
                                            </tr>
                                            </thead>
                                            <tbody id="classesTableBody">
                                                @if($classes != null)
                                                    @foreach($classes as $class)
                                                        <tr>
                                                            <td>{{$class->subject->name}}</td>
                                                            <td>{{$class->category->category}}</td>
                                                            <td>{{$class->institute}}</td>
                                                            @if($class->day == 1)
                                                                <td>MONDAY</td>
                                                            @elseif($class->day == 2)
                                                                <td>TUESDAY</td>
                                                            @elseif($class->day == 3)
                                                                <td>WEDNESDAY</td>
                                                            @elseif($class->day == 4)
                                                                <td>THURSDAY</td>
                                                            @elseif($class->day == 5)
                                                                <td>FRIDAY</td>
                                                            @elseif($class->day == 6)
                                                                <td>SATURDAY</td>
                                                            @elseif($class->day == 7)
                                                                <td>SUNDAY</td>
                                                            @else
                                                                <td>UNKNOWN</td>
                                                            @endif
                                                            <td>{{date('H:i', strtotime($class->startTime))}}</td>
                                                            <td>{{date('H:i', strtotime($class->endTime))}}</td>
                                                            <td>{{$class->city->cityName}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews">
                            <div class="row">
                                <div class="col-md-12 mediaContent">
                                    {{--<h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>--}}
                                        {{--Reviews</h4>--}}
                                    <p>

                                        <!-- Comments -->
                                        <div class="comments_container">
                                            <div class="comments_title"><span>{{count($comments)}}</span> Reviews</div>
                                            <ul class="comments_list">
                                                <li >
                                                    <div id="commentList">
                                                    {{--@foreach($comments as $comment)--}}
                                                    {{--<div class="comment_item d-flex flex-row align-items-start jutify-content-start">--}}
                                                        {{--@if($comment->iduser_master != null)--}}
                                                            {{--@if($comment->user->image != null)--}}
                                                                {{--<div class="comment_image"><div><img src="{{ URL::asset('my_assets/images/comment_1.jpg')}}" alt=""></div></div>--}}
                                                            {{--@endif--}}
                                                        {{--@endif--}}
                                                        {{--<div class="comment_content">--}}
                                                            {{--<div class="comment_title_container d-flex flex-row align-items-center justify-content-start">--}}
                                                                {{--<div class="comment_author"><a href="#">{{$comment->name}}</a></div>--}}
                                                                {{--<div class="comment_rating"><div class="rating_r rating_r_4"><i></i><i></i><i></i><i></i><i></i></div></div>--}}
                                                                {{--<div class="comment_time ml-auto">{{$comment->created_at->format('Y-m-d')}}</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="comment_text">--}}
                                                                {{--<p>{{$comment->comment}}</p>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="comment_extras d-flex flex-row align-items-center justify-content-start">--}}
                                                                {{--<div class="comment_extra comment_likes"><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span>108</span></a></div>--}}
                                                                {{--<div class="comment_extra comment_reply"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span>Reply</span></a></div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--@endforeach--}}
                                                    </div>



                        <hr/>
                        <div class="add_comment_container">
                            <div class="add_comment_title">Write a comment</div>
                            <div class="add_comment_text">Your email address will not be published. All fields are required!</div>
                            <form action="{{ route('saveComment') }}"  method="POST" id="commentForm" class="comment_form">
                                <input type="hidden" class="notClear" name="teacherId" value="{{App\Teacher::find(intval($teacher))->idteacher}}">
                                {{csrf_field()}}
                                <div>
                                    <div class="form_title">Review*</div>
                                    <textarea class="comment_input comment_textarea" name="comment" required="required"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 input_col">
                                        <div class="form_title">Name*</div>
                                        <input type="text" class="comment_input" value="{{\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->fName.' '.\Illuminate\Support\Facades\Auth::user()->lName : ''}}" name="name" required="required">
                                    </div>
                                    <div class="col-md-6 input_col">
                                        <div class="form_title">Email*</div>
                                        <input type="text" class="comment_input" name="email" value="{{\Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->email : ''}}" required="required">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="comment_button trans_200">submit</button>
                                </div>
                            </form>
                        </div>
                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact">
                            <div class="row">
                                @if(App\Teacher::find(intval($teacher))->addressLine1 != null)

                                <div class="col-md-12 mediaContent">
                                    <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                        My address</h4>
                                    <p>{{App\Teacher::find(intval($teacher))->addressLine1}}</p>
                                    <p style="margin-top: -17px;">{{App\Teacher::find(intval($teacher))->addressLine2}}</p>  </div>

                                @endif
                                @if(App\Teacher::find(intval($teacher))->showContact == 1 && App\Teacher::find(intval($teacher))->user->contact != null)

                                    <div class="col-md-12 mediaContent">
                                        <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                            Telephone</h4>
                                        <p ><a style="text-decoration: none;" href='tel:"{{App\Teacher::find(intval($teacher))->linkedin}}"'>{{App\Teacher::find(intval($teacher))->user->contact}}</a></p>
                                    </div>
                                @endif
                                @if(App\Teacher::find(intval($teacher))->showContact == 1 && App\Teacher::find(intval($teacher))->user->contact != null)
                                    <div class="col-md-12 mediaContent ">
                                        <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                            Visit my persona website</h4>
                                        <p ><a style="text-decoration: none;" href='tel:"{{App\Teacher::find(intval($teacher))->linkedin}}"'>{{App\Teacher::find(intval($teacher))->user->contact}}</a></p>
                                    </div>
                                @endif

                                        <div class="col-md-12 mediaContent">
                                            <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                                Follow me on social media</h4>
                                            <br/>

                                            <div class="row" style="margin-left: 30px;">
                                                @if(App\Teacher::find(intval($teacher))->facebook != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->facebook}}"> <div class="socialWrapper"> <span class="fa fa-facebook social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->instagram != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->instagram}}"><div class="socialWrapper"> <span class="fa fa-instagram social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->twitter != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->twitter}}"><div class="socialWrapper"> <span class="fa fa-twitter social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->linkedin != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->linkedin}}"><div class="socialWrapper"> <span class="fa fa-linkedin social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->google != null)
                                                    <div class="col-md-1"><div class="socialWrapper"> <span class="fa fa-google social"></span></div></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->youtube != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->youtube}}"><div class="socialWrapper"> <span class="fa fa-youtube social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->viber != null)
                                                    <div class="col-md-1"><a target="_blank" href='viber://pa?chatURI="{{App\Teacher::find(intval($teacher))->viber}}"&text=Hi'><div class="socialWrapper"> <span class="fa fa-viber social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->whatsapp != null)
                                                    <div class="col-md-1"><a target="_blank" href='https://api.whatsapp.com/send?phone="{{App\Teacher::find(intval($teacher))->whatsapp}}"'><div class="socialWrapper"> <span class="fa fa-whatsapp social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->pinterest != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->pinterest}}"><div class="socialWrapper"> <span class="fa fa-pinterest social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->snapchat != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->snapchat}}"><div class="socialWrapper"> <span class="fa fa-snapchat-ghost social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->skype != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->skype}}"><div class="socialWrapper"> <span class="fa fa-skype social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->dribbble != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->dribbble}}"><div class="socialWrapper"> <span class="fa fa-dribbble social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->vimeo != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->vimeo}}"><div class="socialWrapper"> <span class="fa fa-vimeo social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->tumblr != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->tumblr}}"><div class="socialWrapper"> <span class="fa fa-tumblr social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->vine != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->vine}}"><div class="socialWrapper"> <span class="fa fa-vine social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->foursquare != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->foursquare}}"><div class="socialWrapper"> <span class="fa fa-foursquare social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->stumbleupon != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->stumbleupon}}"><div class="socialWrapper"> <span class="fa fa-stumbleupon social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->flickr != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->flickr}}"><div class="socialWrapper"> <span class="fa fa-flickr social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->yahoo != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->yahoo}}"><div class="socialWrapper"> <span class="fa fa-yahoo social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->reddit != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->yahoo}}"><div class="socialWrapper"> <span class="fa fa-reddit social"></span></div></a></div>
                                                @endif
                                                @if(App\Teacher::find(intval($teacher))->soundcloud != null)
                                                    <div class="col-md-1"><a target="_blank" href="{{App\Teacher::find(intval($teacher))->soundcloud}}"><div class="socialWrapper"> <span class="fa fa-soundcloud social"></span></div></a></div>
                                                @endif
                                            </div>

                                        </div>
                            </div>

                        </div>
                    </div>

                </div>  <!-- content end -->
                <div class="col-md-2"> <!-- sidebar start -->
                    @include('includes.sidebar')
                </div> <!-- sidebar end -->

            </div>
        </div>
            <br/>
            <br/>
            <br/>


@endsection
@section('customScript')
    <script>
        $(document).ready(function () {
            loadComments();

        } );

        $("#liveSearch").keyup(function() {


            // Retrieve the input field text and reset the count to zero
            var filter = $(this).val();

            // Loop through the table rows
            $("#classesTableBody tr").each(function () {

                // If the list item does not contain the text phrase fade it out
                if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                    $(this).fadeOut();

                    // Show the list item if the phrase matches and increase the count by 1
                } else {
                    $(this).show();
                }
            });
        });

        $('#commentForm').on('submit',function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                data: $(this).serialize(),
                url: "{{ route('saveComment') }}",
                success: function (data) {
                    if(data.errors != null){
                        $.each(data.errors, function (key, value) {
                            Swal.fire({
                                title: "Error!",
                                text: ""+value+"!",
                                icon: "error",
                                button: "OK",
                            });
                        });

                    }
                    if(data.success != null){
                        $('input').not('.notClear').val('');
                        $('textarea').val('');
                        Swal.fire({
                            title: "Saved!",
                            text: "Comment will publish after administrator approve!",
                            icon: "success",
                            button: "OK",
                        });
                        loadComments();
                    }


                }
            });
        });

        function loadComments() {

            let teacher = "{{intval($teacher)}}";
            $.ajax({
                type: 'POST',
                data: {teacher:teacher},
                url: "{{ route('loadComments') }}",
                success: function (data) {
                   console.log(data);

                    $('#commentList').html(data.success);
                }
            });
        }
    </script>
@endsection



