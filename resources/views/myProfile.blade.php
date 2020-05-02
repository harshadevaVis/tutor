@extends('layouts.main')
@section('customLinks')
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


            .profilePicWrapper {
                position: relative;

            }

            .profilePicWrapper:hover .profileOverlayBtn {
                position: absolute;
                border-radius: 20%;
                top: 63%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                background-color: rgba(69, 89, 210, 0.85);
                color: #ffffff;
                font-size: 16px;
                border: none;
                cursor: pointer;
                text-align: center;
            }

            .profilePicWrapper .profileOverlayBtn {
                position: absolute;
                top: 63%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                background-color: rgba(85, 85, 85, 0.35);
                color: #ffffff;
                font-size: 16px;
                padding: 12px 24px;
                border: none;
                cursor: pointer;
                border-radius: 20%;
                text-align: center;
            }

            .profilePicWrapper .profileOverlayBtn:hover {
                background-color: rgba(47, 61, 145, 0.85);
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
            .pac-container {
                background-color: #FFF;
                z-index: 200;
                position: fixed;
                display: inline-block;
                float: left;
            }

            .modal{
                z-index: 200;
            }

            .modal-backdrop{
                z-index: 100;
            }​

        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {


        }

        /*Social media icons start*/
        .socialWrapper{
            text-align: center;
            margin-bottom: 15px ;
        }

        .social{
            font-size: 30px;
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

        .complete{
            position: fixed; /* Sit on top of the page content */
            display: none; /* Hidden by default */
            width: 100%; /* Full width (cover the whole page) */
            height: 100%; /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(66, 169, 25, 0.5); /* Black background with opacity */
            z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer; /* Add a pointer on hover */
        }
        .added-facebook {
            background: #3B5998;
            color: white;
        }

        .added-twitter {
            background: #55ACEE;
            color: white;
        }

        .added-google {
            background: #dd4b39;
            color: white;
        }

        .added-linkedin {
            background: #007bb5;
            color: white;
        }

        .added-youtube {
            background: #bb0000;
            color: white;
        }

        .added-instagram {
            background: #d6249f;
            background: radial-gradient(circle at 5% 90%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
            color: #fff;
        }

        .added-pinterest {
            background: #cb2027;
            color: white;
        }
        .added-whatsapp {
            background: #27cb28;
            color: white;
        }
        .added-viber {
            background: #665cac;
            color: white;
        }

        .added-snapchat {
            background: #fffc00;
            color: white;
            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        .added-skype {
            background: #00aff0;
            color: white;
        }

        .added-dribbble {
            background: #ea4c89;
            color: white;
        }

        .added-vimeo {
            background: #45bbff;
            color: white;
        }

        .added-tumblr {
            background: #2c4762;
            color: white;
        }

        .added-vine {
            background: #00b489;
            color: white;
        }

        .added-foursquare {
            background: #45bbff;
            color: white;
        }

        .added-stumbleupon {
            background: #eb4924;
            color: white;
        }

        .added-flickr {
            background: #f40083;
            color: white;
        }

        .added-yahoo {
            background: #430297;
            color: white;
        }

        .added-soundcloud {
            background: #ff5500;
            color: white;
        }

        .added-reddit {
            background: #ff5700;
            color: white;
        }


        /*Social media icons end*/
    </style>
@endsection
@section('pageSpecificContent')
    <div class="container">


        <div class="row "> <!-- profile pic with cover start -->
            <div class="cover"></div>
            <div class="col-md-3 col-sm-12 text-center profilePicWrapper">

                @if(\Illuminate\Support\Facades\Auth::user()->image != null)
                    <img id="profilePic" class="profilePic" alt="Display image" width="260px" height="260px" src="{{ URL::asset('my_assets/images/profile/'.\Illuminate\Support\Facades\Auth::user()->image.'')}}">
                @else
                    <img id="profilePic" class="profilePic" alt="Display image" width="260px" height="260px" src="{{ URL::asset('my_assets/images/profile/default.jpg')}}">

                @endif
                 <button onclick="this.blur();$('#profileInput').click()" class="btn profileOverlayBtn"><em class="fa fa-edit"></em></button>
            </div>
            <form id="profileImageForm"  method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="profileInput" id="profileInput" onchange="$('#profileImageForm').submit();readURL(this);" style="display: none" accept="image/x-png,image/gif,image/jpeg">
            </form>
            <div class="col-md-9 col-sm-12 nameContainer">
                {{--<h2 class="nameClause"><input type="text" name="displayName" value="{{\Illuminate\Support\Facades\Auth::user()->fName . ' '. \Illuminate\Support\Facades\Auth::user()->lName}}" id="displayName"/> Mr.Harshadeva priyankara bandara</h2>--}}
                {{--<h2 class="nameClause"><input type="text" name="displayName" value="Mr.Harshadeva priyankara bandara" id="displayName"/> Mr.Harshadeva priyankara bandara</h2>--}}
                @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->displayName != null)
                    <h2 class="nameClause"><input type="text" name="displayName" value="{{\Illuminate\Support\Facades\Auth::user()->teacher->displayName}}" id="displayName" onkeypress="this.style.width = ((this.value.length + 1) * 20) + 'px';" style="display: none"/> <span id="nameSpan">{{\Illuminate\Support\Facades\Auth::user()->teacher->displayName}}</span>&nbsp;<button id="nameEditBtn" onclick="nameEditClick(this)" class="btn"><em class="fa fa-edit"></em> </button></h2>
                @else
                    <h2 class="nameClause"><input type="text" name="displayName" value="{{\Illuminate\Support\Facades\Auth::user()->fName . ' '. \Illuminate\Support\Facades\Auth::user()->lName}}" id="displayName" onkeypress="this.style.width = ((this.value.length + 1) * 20) + 'px';" style="display: none"/> <span id="nameSpan">{{\Illuminate\Support\Facades\Auth::user()->fName . ' '. \Illuminate\Support\Facades\Auth::user()->lName}}</span>&nbsp;<button id="nameEditBtn" onclick="nameEditClick(this)" class="btn"><em class="fa fa-edit"></em> </button></h2>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->tagLIne != null)
                    <p class="nameClause"><input type="text" name="tagLine" value="{{\Illuminate\Support\Facades\Auth::user()->teacher->tagLIne}}" id="tagLine" onkeypress="this.style.width = ((this.value.length + 1) * 7) + 'px';" style="display: none"/> <i id="tagItalic">{{\Illuminate\Support\Facades\Auth::user()->teacher->tagLIne}}</i>&nbsp;&nbsp;&nbsp;<button id="tagEditBtn" onclick="tagEditClick(this)" class="btn btn-sm"><em class="fa fa-edit"></em> </button></p>
                @else
                    <p class="nameClause"><input type="text" name="tagLine" placeholder="Create your tag line" id="tagLine" onkeypress="this.style.width = ((this.value.length + 1) * 7) + 'px';" style="display: none"/> <i id="tagItalic">Your tag line goes here</i>&nbsp;&nbsp;&nbsp;<button id="tagEditBtn" onclick="tagEditClick(this)" class="btn btn-sm"><em class="fa fa-edit"></em> </button></p>
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
                        <a href="#contacts" class="nav-link" data-toggle="tab">Contacts</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="dashboard">
                        <div class="row">
                            <div class="col-md-12">
                                <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span> About me</h4>
                                <textarea style="width: 98%; margin-left: 1%" rows="3" name="aboutMe" placeholder="Describe your self here.." id="aboutMe">
                                </textarea></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                    Skills</h4>
                                <textarea style="width: 98%; margin-left: 1%" rows="3" name="skills" placeholder="Describe your skills here.."  id="skills"></textarea></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                    My Objective</h4>
                                <textarea style="width: 98%; margin-left: 1%;margin-top: 2px" rows="3" name="objective"  placeholder="Describe your objective here.."  id="objective"></textarea></div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <button class="btn btn-success pull-right mr-2 mt-2" onclick="saveDashBoard(this)">Save Dashboard</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="classes">
                        <div class="row">
                            <div class="col-md-12">
                                <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                    Classes</h4>
                                <button id="addClassBtn" class="btn btn-info mb-2 align-self-md-end" onclick="classAdd()">Add New class</button>

                                <div class="form-group">
                                    <input  autocomplete="off" type="text" class="form-control" name="liveSearch" id="liveSearch" placeholder="Looking for something in the table. . ."/>
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

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews">
                        <div class="row">
                            <div class="col-md-12">
                                <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                    Reviews</h4>
                                <p>
                                <div id="commentList">
                                    <p style="margin: 30px;">No reviews yet.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contacts">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">

                                        <div class="col-md-12 mediaContent">
                                            <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                                My address</h4>
                                            <p></p>
                                            <p style="margin-top: -17px;">
                                                <input  autocomplete="off" type="text" class="form-control mb-2" name="addressLine1" id="addressLine1" placeholder="Address line 1" value="{{\Illuminate\Support\Facades\Auth::user()->teacher != null ? \Illuminate\Support\Facades\Auth::user()->teacher->addressLine1 : ''  }}"/>
                                                <input  autocomplete="off" type="text" class="form-control" name="addressLine2" id="addressLine2" placeholder="Address line 2" value="{{\Illuminate\Support\Facades\Auth::user()->teacher != null ? \Illuminate\Support\Facades\Auth::user()->teacher->addressLine2 : ''  }}"/>
                                            </p>  </div>


                                        <div class="col-md-12 mediaContent">
                                            <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                                Telephone</h4>
                                            <p style="text-align: left;margin-left: 30px;">
                                                <input type="checkbox" id="showContact" {{\Illuminate\Support\Facades\Auth::user()->teacher != null ? (\Illuminate\Support\Facades\Auth::user()->teacher->showContact == 1 ? 'checked' : '') : ''  }}>
                                                <label for="showContact"> Show my contact number</label>
                                             </p>
                                        </div>
                                        <div class="col-md-12 mediaContent ">
                                            <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                                Visit my personal website</h4>
                                            <p ><a style="text-decoration: none;" >
                                                    <input  autocomplete="off"  type="text" class="form-control" name="mywebSite" placeholder="wwww.mywebsite.com" id="mywebSite" value="{{\Illuminate\Support\Facades\Auth::user()->teacher != null ? \Illuminate\Support\Facades\Auth::user()->teacher->web : ''  }}" />
                                                </a></p>
                                        </div>

                                    <div class="col-md-12 mediaContent">
                                        <h4><span style="padding: 10px;" class="fa fa-angle-double-right"></span>
                                            Follow me on social media</h4>
                                        <br/>

                                        <div class="row" style="margin-left: 30px;">
                                            <div class="col-md-1"><div onclick="showSocialModal('facebook')" class="socialWrapper"><span class="fa fa-facebook @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->facebook != null) added-facebook @endif social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('instagram')" class="socialWrapper"> <span class="fa fa-instagram @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->facebook != null) added-instagram @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('twitter')" class="socialWrapper"> <span class="fa fa-twitter @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->twitter != null) added-twitter @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('linkedin')" class="socialWrapper"> <span class="fa fa-linkedin @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->linkedin != null) added-linkedin @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('youtube')" class="socialWrapper"> <span class="fa fa-youtube @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->youtube != null) added-youtube @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('whatsapp')" class="socialWrapper"> <span class="fa fa-whatsapp @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->whatsapp != null) added-whatsapp @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('viber')" class="socialWrapper"> <span class="fa fa-viber @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->viber != null) added-viber @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('pinterest')" class="socialWrapper"> <span class="fa fa-pinterest @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->pinterest != null) added-pinterest @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('snapchat-ghost')" class="socialWrapper"> <span class="fa fa-snapchat-ghost @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->snapchat != null) added-snapchat @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('skype')" class="socialWrapper"> <span class="fa fa-skype @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->skype != null) added-skype @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('dribbble')" class="socialWrapper"> <span class="fa fa-dribbble @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->dribbble != null) added-dribbble @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('vimeo')" class="socialWrapper"> <span class="fa fa-vimeo @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->vimeo != null) added-vimeo @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('tumblr')" class="socialWrapper"> <span class="fa fa-tumblr @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->tumblr != null) added-tumblr @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('vine')" class="socialWrapper"> <span class="fa fa-vine @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->vine != null) added-vine @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('foursquare')" class="socialWrapper"> <span class="fa fa-foursquare @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->foursquare != null) added-foursquare @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('stumbleupon')" class="socialWrapper"> <span class="fa fa-stumbleupon @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->stumbleupon != null) added-stumbleupon @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('flickr')" class="socialWrapper"> <span class="fa fa-flickr @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->flickr != null) added-flickr @endif  social"></span></div></div>
                                            {{--<div class="col-md-1"><div onclick="showSocialModal('yahoo')" class="socialWrapper"> <span class="fa fa-yahoo @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->yahoo != null) added-yahoo @endif  social"></span></div></div>--}}
                                            <div class="col-md-1"><div onclick="showSocialModal('reddit')" class="socialWrapper"> <span class="fa fa-reddit @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->reddit != null) added-reddit @endif  social"></span></div></div>
                                            <div class="col-md-1"><div onclick="showSocialModal('soundcloud')" class="socialWrapper"> <span class="fa fa-soundcloud @if(\Illuminate\Support\Facades\Auth::user()->teacher != null &&\Illuminate\Support\Facades\Auth::user()->teacher->soundcloud != null) added-soundcloud @endif  social"></span></div></div>

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <button class="btn btn-success pull-right mr-2 mt-2" onclick="saveContacts(this)">Save Contacts</button>
                                        </div>
                                    </div>
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
    <!--Modal Start-->
    <div class="modal fade" id="socialModal" tabindex="-1"
         role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0"><span id="socialTitle"></span> </h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input class="form-control" type="text" id="slink" placeholder="Paste your link here" name="institute"/>
                            </div>
                        </div>
                        <input type="hidden" id="socialType"/>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-info mb-2" onclick="saveSocialMedia(this)">Save</button>
                            </div>
                        </div>
                    </div>
                    </div>


                </div>
            </div>
        </div>
    <!--Modal End-->

    <!--Modal Start-->
    <div class="modal fade" id="classAddModal" tabindex="-1"
         role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Class</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info alert-dismissible " id="successAlert" style="display:none">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible " id="errorAlert" style="display:none">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="grade">Category</label>  <span id="category_error" class="text-danger errorMsg">*</span>

                                <select class="form-control" name="category"  id="category" onchange="categoryChange(this)" >
                                    <option class="text-black" selected disabled value="">Choose category...</option>
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <option value="{{$category->idcategory}}">{{$category->category}}</option>
                                        @endforeach
                                    @endif
                                    <option class="text-muted bg-secondry" value=0>+ Add New </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="subject">Subject</label> <span id="subject_error" class="text-danger errorMsg">*</span>

                                <select class="form-control" name="subject"  id="subject" onchange="subjectChange(this)" >
                                    <option class="text-black" selected disabled value="">Select category first...</option>
                                    <option class=\"text-muted\"  value=\"0\">+ Add New</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="institute">Institute</label> <span id="institute_error" class="text-danger errorMsg">*</span>
                                <input class="form-control" type="text" id="institute" name="institute"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="day">Day</label> <span id="day_error" class="text-danger errorMsg">*</span>

                                        <select class="form-control" name="day"  id="day"  >
                                            <option class="text-black" selected disabled value="">Choose day...</option>
                                            <option class="text-black"  value="1">Monday</option>
                                            <option class="text-black"  value="2">Tuesday</option>
                                            <option class="text-black"  value="3">Wednesday</option>
                                            <option class="text-black"  value="4">Thursday</option>
                                            <option class="text-black"  value="5">Friday</option>
                                            <option class="text-black"  value="6">Saturday</option>
                                            <option class="text-black"  value="7">Sunday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="city">City</label> <span id="city_error" class="text-danger errorMsg">*</span>

                                        <input id="city" name="city" class="form-control " type="text" placeholder="City name">

                                        {{--<select class="form-control" name="city"  id="city"  >--}}
                                        {{--<option value="">Choose city...</option>--}}
                                        {{--@if(isset($cities))--}}
                                        {{--@foreach($cities as $city)--}}
                                        {{--<option value="{{$city->idcity}}">{{$city->cityName}}</option>--}}
                                        {{--@endforeach--}}
                                        {{--@endif--}}
                                        {{--</select>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-6" style="text-align: center;">
                                    <div class="form-group">
                                        <label for="start">Start at</label> <span id="start_error" class="text-danger errorMsg">*</span>
                                        <div>
                                            <div class="input-group">
                                                <input  autocomplete="off" type="time" class="form-control datepicker-autoclose " placeholder="mm/dd/yyyy" name="start" id="start">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><em class="fa fa-clock"></em></span>
                                                </div>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: center;">
                                    <div class="form-group">
                                        <label for="end">End at</label>
                                        <div>
                                            <div class="input-group">
                                                <input  autocomplete="off" type="time" class="form-control datepicker-autoclose " placeholder="mm/dd/yyyy" name="end" id="end">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><em class="fa fa-clock"></em></span>
                                                </div>
                                            </div><!-- input-group -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <button class="btn btn-info mb-2" onclick="saveClass(this)">Add class</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--Modal End-->

@endsection
@section('customScript')
    <script>
        $(document).ready(function () {
            if("{{isset($_REQUEST['classes'])}}"){
                $('[href="#classes"]').tab('show');
                $('#addClassBtn').click();
            }
           showClasses();
            loadComments();
           @if(\Illuminate\Support\Facades\Auth::user()->teacher != null)
           $('#aboutMe').html("{{ \Illuminate\Support\Facades\Auth::user()->teacher->about}}");
           $('#skills').html("{{ \Illuminate\Support\Facades\Auth::user()->teacher->skills}}");
           $('#objective').html("{{ \Illuminate\Support\Facades\Auth::user()->teacher->objective}}");
           @endif
        });

        function loadComments() {

            $.ajax({
                type: 'POST',
                url: "{{ route('loadCommentsMy') }}",
                success: function (data) {

                    $('#commentList').html(data.success);
                }
            });
        }

        $('#profileImageForm').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('submitImage') }}",
                method:"POST",
                data:new FormData(this),
                dataType:'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success:function(data)
                {   alert(data);
                    $(el).attr('disabled',false);

//                    $('#message').css('display', 'block');
//                    $('#message').html(data.message);
//                    $('#message').addClass(data.class_name);
//                    $('#uploaded_image').html(data.uploaded_image);
                }
            });
        });

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profilePic')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }

        }

        function saveDashBoard(el) {

            let aboutMe = $('#aboutMe').val();
            let skills = $('#skills').val();
            let objective = $('#objective').val();

            $(el).attr('disabled',true);
            $.ajax({
                type: 'POST',
                data: {aboutMe:aboutMe,skills:skills,objective:objective},
                url: "{{ route('saveDashBoard') }}",
                success: function () {
                    Swal.fire({
                        title: 'Saved!',
                        text: 'Your dashboard details saved successfully!',
                        icon: 'success',
                    });
                    $(el).attr('disabled',false);
                }
            });
        }

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

        function nameEditClick(el) {
            $(el).blur().attr('onclick','confirmName(this)');
            $('#nameSpan').hide();
            $('#displayName').show();
            $('#nameEditBtn em').first().removeClass('fa-edit').addClass('fa-check-circle');
        }
        function confirmName(el) {
            let displayName = $('#displayName').val();
            $.ajax({
                type: 'POST',
                data: {displayName:displayName},
                url: "{{ route('confirmName') }}",
                success: function () {
                    $(el).blur().attr('onclick','nameEditClick(this)');
                    $('#nameSpan').html(displayName).show();
                    $('#displayName').hide();
                    $('#nameEditBtn em').first().removeClass('fa-check-circle').addClass('fa-edit');
                }
            });
        }

        function tagEditClick(el) {
            $(el).blur().attr('onclick','confirmTag(this)');
            $('#tagItalic').hide();
            $('#tagLine').show();
            $('#tagEditBtn em').first().removeClass('fa-edit').addClass('fa-check-circle');
        }
        function confirmTag(el) {

            let tagLine = $('#tagLine').val();
            $.ajax({
                type: 'POST',
                data: {tagLine:tagLine},
                url: "{{ route('confirmTag') }}",
                success: function () {
                    $(el).blur().attr('onclick','tagEditClick(this)');
                    $('#tagItalic').html(tagLine).show();
                    $('#tagLine').hide();
                    $('#tagEditBtn em').first().removeClass('fa-check-circle').addClass('fa-edit');
                }
            });


        }
        function classAdd() {
            $('#classAddModal').modal('show');
        }
        function saveClass(el) {
//            $(el).attr('disabled',true);
            $('.errorMsg').each (function () {
                $(this).html('*');
            });

            let city = $('#city').val();
            let subject = $('#subject').val();
            let category = $('#category').val();
            let institute = $('#institute').val();
            let day = $('#day').val();
            let start = $('#start').val();
            let end = $('#end').val();

            $.ajax({
                type: 'POST',
                data: {city:city,subject:subject,category:category,institute:institute,day:day,start:start,end:end},
                url: "{{ route('saveClass') }}",
                success: function (data) {
                    $(el).attr('disabled',false);
                    if (data.errors != null) {

                    $('#city_error').html(data.errors['city']);
                    $('#subject_error').html(data.errors['subject']);
                    $('#category_error').html(data.errors['category']);
                    $('#institute_error').html(data.errors['institute']);
                    $('#day_error').html(data.errors['day']);
                    $('#start_error').html(data.errors['start']);
                    }

                    if(data.success != null){
                        Swal.fire({
                            title: "Saved!",
                            text: "Your new class details saved successfully!",
                            icon: "success",
                            button: "OK",
                        });
                        $('input').val('');
                        $('select').val('').trigger('change');
                        $('#classAddModal').modal('hide');
                        showClasses();
                    }

                }
            });
        }

        function categoryChange(el) {
            let cat = el.value;
            if(cat == '0'){
                window.location.href = "{{ route('addCategory') }}";
            }
            else {
                $.ajax({
                    type: 'POST',
                    data: {cat: cat},
                    url: "{{ route('categoryChange_profile') }}",
                    success: function (data) {
                        $('#subject').html("<option selected disabled value=''>Choose Subject...</option>");
                        $('#subject').append(data.success);
                        $('#subject').append("<option class=\"text-muted\"  value=\"0\">+ Add New</option>");
                    }
                });
            }
        }

        function showClasses() {
            $.ajax({
                type: 'POST',
                url: "{{ route('showClasses') }}",
                success: function (data) {
                   $('#classesTableBody').html(data);
                }
            });
        }

        function initMap() {
            var input = document.getElementById('city');
            var options = {
                types: ['(cities)'],
                componentRestrictions: {country: "LK"}
            };
            var autocomplete = new google.maps.places.Autocomplete(input,options);

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
//                document.getElementById('location-snap').innerHTML = place.formatted_phone_number;
//                document.getElementById('lat-span').innerHTML = place.geometry.location.lat();
//                document.getElementById('lon-span').innerHTML = place.geometry.location.lng();
//                alert(place.name);
                $('#city').val(place.name);
            });
        }
        function saveSocialMedia(el) {
//            $(el).attr('disabled',true);
            var link = $('#slink').val();
            var type = $('#socialType').val();
            if(type == 'snapchat-ghost' ){
                type = 'snapchat'
            }

            $.ajax({
                type: 'POST',
                url: "{{ route('saveSocialMedia') }}",
                data:{link:link,type:type},
                success: function () {
                    $(el).attr('disabled',false);
                    $('#slink').val('');
                    if(type == 'snapchat' ){
                        $('.fa-snapchat-ghost').addClass('added-'+type);
                    }
                    else{
                        $('.fa-'+type).addClass('added-'+type);

                    }
                    $('#socialModal').modal('hide');

                }
            });
        }

        function saveContacts(el) {
//            $(el).attr('disabled',true);
            var address1 = $('#addressLine1').val();
            var address2 = $('#addressLine2').val();
            var showTel = $('#showContact').prop('checked');
            var myWeb = $('#mywebSite').val();

            alert(myWeb);
            $.ajax({
                type: 'POST',
                url: "{{ route('saveContact') }}",
                data:{address1:address1,address2:address2,showTel:showTel,myWeb:myWeb},
                success: function (data) {
                    if(data.success != null) {
//                        $('input').val('').prop('checked',false);
                        Swal.fire({
                            title: 'Saved!',
                            text: 'Your contacts details saved successfully!',
                            icon: 'success',
                        });
                    }
                    $(el).attr('disabled',false);

                }
            });
        }

        function showSocialModal(type) {
            $('#socialTitle').html(type);
            $('#socialType').val(type);

            if(type == 'viber' || type == 'whatsapp'){
                $('#slink').attr('placeholder','Type your number here');
                $('#slink').attr('type','number');
                $('#slink').attr('min','0');
            }
            else{
                $('#slink').attr('placeholder','www.'+type+'.com/your_account');
                $('#slink').removeAttr('min');
                $('#slink').attr('type','text');
            }
            $('#slink').val('');

            $('#socialModal').modal('show');
        }

        function subjectChange(el) {
            var sub = el.value;
            if(sub == '0'){
                window.location.href = "{{ route('addCategory') }}";
            }
        }
    </script>
@endsection



