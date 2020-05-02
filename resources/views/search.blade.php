@extends('layouts.main')
@section('customLinks')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('my_assets/styles/courses.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('my_assets/styles/courses_responsive.css')}}">

    <style rel="stylesheet" type="text/css">
        .supperContainer{
            background-color: #fffbfb;
        }
        .profileContainer{
            min-height: 390px;
        }
        .profile:hover{

            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .select2-selection{
            padding-top: 2px;
        }

        .profilePic{
            border-radius: 100%;
            width: 100%;
            height: 250px;

        }


    </style>
@endsection
@section('pageSpecificContent')

        <div class="container">
            <div class="row">

                <!-- Courses Main Content -->
                <div class="col-lg-10 mt-5 mb-2">
                    <div class="row">



                        <div class="col-lg-4">
                            <div class="form-group">

                                <input id="citySearch" class="form-control mapControls" type="text" placeholder="Enter a location">
                                {{--<ul id="geoData">--}}
                                    {{--<li>Full Address: <span id="location-snap"></span></li>--}}
                                    {{--<li>Latitude: <span id="lat-span"></span></li>--}}
                                    {{--<li>Longitude: <span id="lon-span"></span></li>--}}
                                {{--</ul>--}}
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="form-control"  id="category" onchange="categoryChange(this)" >
                                    @if(isset($categories))
                                        <option class="text-black" selected disabled value="">Choose category ...</option>
                                        <option class="text-black"  value="">Any</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->idcategory}}">{{$category->category}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 ">
                            <div class="form-group ">
                                <select class="select2 form-control select2-multiple" multiple="multiple" id="subjects" multiple data-placeholder="Choose subjects..." >

                                    @if(isset($subjects))
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->idsubject}}">{{$subject->name}}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>


                        <div class="col-lg-4">
                            <div class="form-group">

                                <input  autocomplete="=off" type="text" class="form-control" name="keyword" id="keyword"
                                        placeholder="keyword"/>

                            </div>
                        </div>


                        <div class="col-md-2" >
                            <button  type="button"  id="addBtn" onclick="getSearchResult(this)"
                                     class="btn btn-md btn-info waves-effect waves-light  tab ">
                                Search
                            </button>
                        </div>

                    </div>
                    <div class="row" id="profilesDiv">
                        {{--@if($teachers)--}}
                            {{--@foreach($teachers as $teacher)--}}
                            {{--<div class="col-lg-4 col-md-6  mt-5  mt-md-0 profileContainer">--}}
                                {{--<div class="card m-b-20 profile ">--}}
                                    {{--<div class="card-body">--}}

                                        {{--<a href="{{route('viewProfile',['teacher'=>$teacher->idteacher])}}">--}}
                                            {{--@if(\App\Teacher::find(intval($teacher->idteacher))->image != null)--}}
                                                {{--<img id="profilePic" class="profilePic" alt="Display image" width="100%" src="{{ URL::asset('my_assets/images/profile/'.\App\Teacher::find(intval($teacher->idteacher))->image.'')}}">--}}
                                            {{--@else--}}
                                                {{--<img id="profilePic" class="profilePic" alt="Display image" width="100%"  src="{{ URL::asset('my_assets/images/profile/default.jpg')}}">--}}

                                            {{--@endif--}}

                                            {{--@if($teacher->displayName != null)--}}
                                                {{--<div class="team_title"><a href="#">{{$teacher->displayName}}</a></div>--}}
                                            {{--@else--}}
                                                {{--<div class="team_title"><a href="#">{{$teacher->user->fName}} {{$teacher->user->lName}}</a></div>--}}

                                            {{--@endif--}}
                                            {{--@if($teacher->tagLIne != null)--}}
                                                {{--<div class="team_subtitle">{{$teacher->tagLIne}}</div>--}}
                                            {{--@else--}}
                                                {{--<div class="team_subtitle">&nbsp;</div>--}}
                                            {{--@endif--}}

                                        {{--</a>--}}
                                        {{--<div class="social_list">--}}
                                            {{--<ul>--}}
                                                {{--@if($teacher->fb != null)--}}
                                                    {{--<li><a href="{{$teacher->fb}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
                                                {{--@endif--}}
                                                {{--@if($teacher->tweeter != null)--}}
                                                    {{--<li><a href="{{$teacher->tweeter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
                                                {{--@endif--}}
                                                {{--@if($teacher->linkdin != null)--}}
                                                    {{--<li><a href="{{$teacher->linkdin}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>--}}
                                                {{--@endif--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                    </div>
                </div>
                <div class="col-md-2">
                    @include('includes.sidebar')
                </div>
            </div>
        </div>

@endsection
@section('customScript')
    <script >
        $(document).ready(function () {

            var city = "{{isset($_REQUEST['city']) ? $_REQUEST['city'] : ''}}";
            var category = "{{isset($_REQUEST['category']) ? $_REQUEST['category'] : ''}}";
            var subjects = [];
            @if(isset($_REQUEST['subjects']))
                @foreach($_REQUEST['subjects'] as $subject)
                        subjects.push({{$subject}});
                @endforeach
            @endif

            $('#citySearch').val("{{isset($_REQUEST['city']) ? $_REQUEST['city'] : ''}}");
            $('#category').val("{{isset($_REQUEST['category']) ? $_REQUEST['category'] : ''}}").trigger('change');

            $.ajax({
                type: 'POST',
                data: {city:city,category:category,subjects:subjects},
                url: "{{ route('search') }}",
                success: function (data) {
                    console.log(data);
                    $('#profilesDiv').html('');
                    $('#profilesDiv').append(data.success);
                    $("#subjects").val(subjects).trigger('change');

                }
            });
            $("#subjects").val(subjects).trigger('change');

        } );
        function initMap() {
            var input = document.getElementById('citySearch');
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
               $('#citySearch').val(place.name);
            });


        }

        function getSearchResult(el) {
            $(el).attr('disabled',true);
            var city = $('#citySearch').val();
            var category = $('#category').val();
            var subjects = $('#subjects').val();
            var keyword = $('#keyword').val();

            $.ajax({
                type: 'POST',
                data: {city:city,category:category,subjects:subjects,keyword:keyword},
                url: "{{ route('search') }}",
                success: function (data) {
                    $('#profilesDiv').html('');
                    $('#profilesDiv').append(data.success);
                    $(el).attr('disabled',false);

                }
            });
        }

        function categoryChange(el) {
            var cat = el.value;
            $.ajax({
                type: 'POST',
                data: {cat: cat},
                url: "{{ route('categoryChange') }}",
                success: function (data) {
                    $('#subjects').html('');
                    $('#subjects').append(data.success);

                }
            });
        }
    </script>


@endsection





