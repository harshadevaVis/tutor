@extends('layouts.main')
@section('customLinks')

<style>
    #registrationPane {
        width: 100%;
        /*height: 100%;*/
        /*margin-top: 5%;*/
        margin-bottom: 10%;
        background-color: rgba(0, 221, 221, 0.35);
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    .wrapper {
        background-color: rgba(0, 221, 221, 0.35);
        background-color: #A8E4FC;

    {{--background-image: url({{\Illuminate\Support\Facades\URL::asset('my_assets/images/authPages/background3.jpg')}});--}}

{{--background-image: url({{\Illuminate\Support\Facades\URL::asset('my_assets/images/authPages/background2.jpg')}});--}}
/*-moz-background-size: cover;*/
        min-height: 100%;
    }

    .btn-submit {
        background-color: #0dd705;
        color: #ffffff;
        border-radius: 12px;
    }

    .btn-submit:hover {
        background-color: #0dd705;
        color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    .btn-submit:active {
        background-color: #0dd705;
        color: #ffffff;
        border-radius: 12px;
        transform: translateY(2px);
        box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0), 0 17px 50px 0 rgba(0, 0, 0, 0);
    }

    .btn-cancel {
        background-color: #d7811d;
        color: #ffffff;
        border-radius: 12px;
    }

    .btn-cancel:hover {
        background-color: #d7811d;
        color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    .btn-cancel:active {
        background-color: #d7811d;
        color: #ffffff;
        border-radius: 12px;
        transform: translateY(2px);
        box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0), 0 17px 50px 0 rgba(0, 0, 0, 0);
    }

    label {
        color: #000000;
    }

    .coverPage {
        width: 70%;
    }

    .userTypesImg {
        width: 80%;
        margin-top: 5%;
    }

    .userTypesDiv {
        color: #7f7f7f;
        font-weight: bold;
        border-radius: 20px;
        border: solid 3px #f4ecfa;
    }

    .userTypesDiv:hover {
        cursor: pointer;
        transform: scale(1.05);

    }

    .selectedClass {
        color: #1900a6;
        font-weight: bold;
        background-color: #94caff;
        border: solid 1px rgba(123, 123, 125, 0);
        border-radius: 20px;

    }

    .disableClass {
        color: #1900a6;
        font-weight: bold;
        background-color: rgba(166, 167, 175, 0.65);
        border: solid 1px rgba(123, 123, 125, 0);
        opacity: 0.5;
    }

    #registrationPane {
        {{--background-image: url({{\Illuminate\Support\Facades\URL::asset('my_assets/images/authPages/background2.jpg')}});--}}
        -moz-background-size: cover;
        /*width: 700px;*/
        height: 100%;
    }

    body, html {
        height: 100%;
    }



</style>
@endsection
@section('pageSpecificContent')


    <div class="wrapper">
        <div class="container">
            <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div id="registrationPane">
                    <div class="page text-center">

                        <form action="{{route('authenticate')}}" method="POST">
                            {{csrf_field()}}
                            <div class="upper">

                                <div class="row d-flex justify-content-center">
                                    <div class="col-10">
                                        <div class="form-group">
                                           <img src="{{URL::asset('my_assets/images/authPages/lock.png')}}" width="40%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <input style="border-radius: 20px;" autocomplete="off" type="text" class="form-control firstPage"
                                                   name="email" id="email"
                                                   placeholder="E-mail address"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <input style="border-radius: 20px;" autocomplete="off" type="password" class="form-control firstPage"
                                                   name="password" id="password"
                                                   placeholder="Password"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-10 ">
                                        <div class="form-group pull-left">
                                            <button onclick="clearInput()" class="btn btn-cancel">Cancel</button>
                                        </div>
                                        <div class="form-group pull-right">
                                            <button  type="submit" class="btn btn-submit">Process</button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="userType" name="userType">
                            </div>
                        </form>

                        <div class="bottom bg-danger">
                            @if ($error = $errors->first('password'))
                                <div class="alert text-white">
                                    {{ $error }}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection
@section('customScript')
    <script type="text/javascript" src="{{ URL::asset('my_assets/js/book/lib/turn.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('my_assets/js/book/extras/modernizr.2.5.3.min.js')}}"></script>
    <script>
        $(document).ready(function () {
//            $('#flipbook').turn(
//                {
//                    gradients: true,
//                    acceleration: true,
//                    autoCenter : true
//
//                });
        });

        function clearInput() {

            $('.firstPage').val('');
            $('.firstPage').val('').trigger('change');
            $('.userTypes').addClass('userTypesDiv').removeClass('selectedClass').removeClass('disableClass');

        }
        function turn() {
            $('#flipbook').turn('page', 1);
        }

        function selectUserType(id, el) {
            $('#userType').val(id);
            $('.userTypes').removeClass('selectedClass');
            $('.userTypes').addClass('userTypesDiv');
            $('.userTypes').addClass('disableClass');
            $(el).removeClass('userTypesDiv');
            $(el).removeClass('disableClass');
            $(el).addClass('selectedClass');


        }


    </script>
</html>
@endsection