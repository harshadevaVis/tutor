@extends('layouts.main')
@section('customLinks')

<style>
    #registrationPane {
        width: 100%;
        /*height: 100%;*/
        /*margin-top: 5%;*/
        margin-bottom: 10%;
        {{--background-image: url({{\Illuminate\Support\Facades\URL::asset('my_assets/images/authPages/background2.jpg')}});--}}
        -moz-background-size: cover;
        background-color: rgba(0, 221, 221, 0.35);
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    input[type=text] ,input[type=password] {
        border-radius: 20px;
        padding: 2%;
    }
    .wrapper {
        background-color: rgba(0, 221, 221, 0.35);
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
        margin-top: 10%;
    }

    .errorMsg {
        font-size: 1.2em;
    }

    .highlightError {
        border: solid 2px rgba(255, 24, 19, 0.62);
    }


    .wrapper{
        background-color: #A8E4FC;
       {{--background-image: url({{\Illuminate\Support\Facades\URL::asset('my_assets/images/authPages/background3.jpg')}});--}}
        -moz-background-size: cover;
        /*width: 700px;*/
        height: 100%;
    }
</style>
@endsection
@section('pageSpecificContent')


    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12"  >
                    <div class="row col d-flex justify-content-center">
                        <div class="col-md-8">
                            <div id="registrationPane" >
                                <div class="page text-center">

                                <form action="{{route('saveUser')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="upper">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h3><u>Create your free account</u></h3>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                {{--<p>Fist say your name </p>--}}
                                            </div>
                                        </div>


                                        <div class="row d-flex justify-content-center">

                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <input autocomplete="off" type="text" class="form-control firstPage
                                                    @if ($errors->has('fNmae')) highlightError @endif"
                                                           name="fNmae" id="fNmae"
                                                           placeholder="Fist name"/>
                                                    @if ($errors->has('fNmae')) <span  class="errorMsg"  style="color:red;text-align: left;">{{ $errors->first('fNmae') }}</span> @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row  d-flex justify-content-center">
                                            <div class="col-lg-8 ">
                                                <div class="form-group">
                                                    <input autocomplete="off" type="text" class="form-control firstPage @if ($errors->has('lName')) highlightError @endif"
                                                           name="lName" id="lName"
                                                           placeholder="Last name"/>
                                                    @if ($errors->has('lName')) <span  class="errorMsg"  style="color:red;text-align: left;">{{ $errors->first('lName') }}</span> @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  d-flex justify-content-center">
                                            <div class="col-lg-8 ">
                                                <div class="form-group">
                                                    <input autocomplete="off"  type="text" class="form-control firstPage  @if ($errors->has('email')) highlightError @endif"
                                                           name="email" id="email"
                                                           placeholder="E-mail address"/>
                                                    @if ($errors->has('email')) <span class="errorMsg"   style="color:red;text-align: left;">{{ $errors->first('email') }}</span> @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  d-flex justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <input autocomplete="off" type="password" class="form-control firstPage  @if ($errors->has('password')) highlightError @endif"
                                                           name="password" id="password"
                                                           placeholder="Password"/>
                                                    @if ($errors->has('password')) <span class="errorMsg"   style="color:red;text-align: left;">{{ $errors->first('password') }}</span> @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  d-flex justify-content-center">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <input autocomplete="off" type="password" class="form-control firstPage  @if ($errors->has('password_confirmation')) highlightError @endif"
                                                           name="password_confirmation" id="password_confirmation"
                                                           placeholder="Re-Type password"/>
                                                    @if ($errors->has('password_confirmation')) <span class="errorMsg"   style="color:red;text-align: left;">{{ $errors->first('password_confirmation') }}</span> @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  d-flex justify-content-center mb-3">

                                            <div class="col-lg-8">
                                                <p>Choose your account type</p><br/>
                                                <div class="col-md-12">
                                                    @if ($errors->has('userType')) <span class="errorMsg"  style="color:red;text-align: left;margin: 2px 2px 2px 2px;">{{ $errors->first('userType') }}</span> @endif

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 ">
                                                        <div onclick="selectUserType(1,this)" class="userTypesDiv userTypes"><img
                                                                    class="userTypesImg"
                                                                    src="{{ URL::asset('my_assets/images/teacher.jpg')}}"> Teacher
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <div onclick="selectUserType(2,this)" class="userTypesDiv userTypes"><img
                                                                    class="userTypesImg"
                                                                    src="{{ URL::asset('my_assets/images/parent.jpg')}}"> Parent
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <div onclick="selectUserType(3,this)" class="userTypesDiv userTypes"><img
                                                                    class="userTypesImg"
                                                                    src="{{ URL::asset('my_assets/images/student.jpg')}}"> Student
                                                        </div>
                                                    </div>

                                                </div>

                                                {{--<div class="form-group">--}}
                                                {{--<select class="form-control firstPage"  id="userType">--}}

                                                {{--<option selected disabled value="">Select user type</option>--}}
                                                {{--<option  value="1">I'm a Teacher</option>--}}
                                                {{--<option  value="2">I'm a parent</option>--}}
                                                {{--<option  value="3">I'm a Student</option>--}}

                                                {{--</select>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-2">
                                            </div>
                                            <div class="col-lg-8 ">
                                                <div class="form-group pull-left">
                                                    <button onclick="clearInput()" class="btn btn-cancel">Cancel</button>
                                                </div>
                                                <div class="form-group pull-right">
                                                    <button  type="submit" class="btn btn-submit">Process</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                            </div>
                                        </div>
                                        <input type="hidden" id="userType" name="userType">
                                    </div>
                                </form>
                                    <div class="bottom bg-primary">

                                        <br/>
                                        <br/>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('customScript')
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