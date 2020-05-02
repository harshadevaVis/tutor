@extends('layouts.main')
@section('customLinks')
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>

    <style>
    body, html {
        height: 100%;
    }

    .bg {
        /* The image used */
        background-image: url({{ URL::asset('my_assets/images/homePage6.jpg')}});

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .itemContent{
        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .homeElements{
        margin-top: 20%;

    }



    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .form{

           padding-top: 3%;
        }

        .bg {
            height: 120%;
        }

        .formWrapper{
            background-color: rgba(255, 255, 255, 0.22);
            text-align: center;
            border-radius: 20px;
        }


    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {


    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {


        .form{
            margin-left: 5%;
            padding-top: 1.5%;
        }

        .formWrapper{
            background-color: white;
            text-align: center;
            border-radius: 25px;

        }
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {


        }

    .home_slider_subtitle {
        font: 400 100px/1.3 'Oleo Script', Helvetica, sans-serif;
        color: #08f7ef;
        text-shadow: 4px 4px 0px rgba(0,0,0,0.1);
        font-size: 32px;
    }
</style>
@endsection
@section('pageSpecificContent')

<div class="superContainer bg">    <!-- container with background -->

    <!-- Home -->

    <div class="home " style=" height: 100%;">

        <div class="container"  style=" height: 100%;">

            <!-- Home Slider -->
            <div class="row"  style=" height: 100%;">

                <!-- Home Slider Item -->
                <div class="col-md-12 " style=" height: 100%;" >
                    <div class="row  itemContent" >
                        <div class="col-md-12 text-center homeElements">
                            <div class="home_slider_title align-items-center" style="color: #20d3d6;-webkit-text-stroke: 2px #fcfcfc;"> Welcome !</div>
                            <div class="home_slider_subtitle" >Find the tutor you'r really need</div>
                            <div class="formWrapper">
                                <form action="{{route('returnToSearchPage')}}" method="GET" class="form">

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input id="citySearch" name="city" class="form-control " type="text" placeholder="Enter a location">

                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select class="form-control" name="category"  id="category" onchange="categoryChange(this)" >
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

                                    <div class="col-lg-3 ">
                                        <div class="form-group ">
                                            <select name="subjects[]" class="select2 form-control select2-multiple" multiple="multiple" id="subjects" multiple data-placeholder="Choose subjects..." >

                                                    @if(isset($subjects))
                                                        @foreach($subjects as $subject)
                                                            <option value="{{$subject->idsubject}}">{{$subject->name}}</option>
                                                        @endforeach
                                                    @endif

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3 ">
                                        <button  type="submit"  id="addBtn"
                                                 class="btn btn-md btn-info waves-effect waves-light  tab ">
                                            Search
                                        </button>
                                    </div>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> {{--superContainer end--}}
</div>
@endsection
@section('customScript')
<script type="text/javascript">

    $(document).ready(function() {
        $(".select2").select2();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

    });

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





