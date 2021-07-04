<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@include('Layouts.header')
{{--@extends('layouts.app')--}}
<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>

<div class="main-content">

    <?php
    $_FILES = $account->image;
    if ($_FILES == NULL) {
        $_FILES = 'images/penguinquestionmark.jpg';
    }
    ;?>
    <script>


        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }

        }

    </script>


    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="min-height: 600px; background-image: url({{ url('/images/home_slider.jpg') }}); background-size: cover; background-position: center top;">
        <!-- Mask -->

        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="text-white"><big><big>Hello {{ $account->username }} </big></big></h1>
                    <p class="text-white mt-0 mb-5">This is your profile page. You can see your information and edit
                        them.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-8 order-xl-1">
                <div class="card  shadow" style="background-color: #f2f4f4 ">
                    <div class="card-header border-0" style="text-align: center; background-color: #f2f4f4">
                        <img src="/{{$_FILES}}" class="rounded-circle"
                             style="width: 200px;height: 200px; border: 3px solid #34495e;">
                        <h1 style="color: #34495e;padding-top: 8px"> {{ $account->username }}</h1>

                        @if($account->accountID != \Illuminate\Support\Facades\Auth::user()->accountID)
                        <button name="reportedID" title="leave" style="background-color:transparent;" class="button0 button3"
                                onclick="myFunction()"
                                value="">
                            Report User
                        </button>
                        @endif
{{--                        , ['id' => $account->accountID]--}}
                        <form action="{{ route('profile_report') }}" method="POST" id="frm">
                            @csrf
                            <input type="hidden" name="reportedID" value="{{$account->accountID}}" />
                            <div id="myDIV" style="display: none;">
                                <hr class="my-4">
                                <strong>Reason</strong>
                                <select name="reason" class="form-control" form="frm">
                                    <option  value="Spam or Advertisement">Spam or Advertisement</option>
                                    <option  value="Bad Behavior">Bad Behavior</option>
                                    <option  value="Copyright">Copyright</option>
                                </select><br>
                                <strong>Message (optional)</strong>
                                <textarea type="text" rows="4"
                                          class="form-control form-control-alternative"
                                          name="message"
                                          form="frm"
                                          placeholder="Write an optional message for the admin"></textarea><br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <hr class="my-4">
                            </div>
                        </form>

                    </div>
                    <div class="card-body">


                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <!--form1 Input for user name-->
                                        <input type="text" id="input-username" name="username"
                                               class="form-control form-control-alternative"
                                               value="{{$account->username}}" readonly/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <!--form1 Input for user Email-->
                                        <input type="email" id="input-email" name="email"
                                               value="{{$account->email}}"
                                               class="form-control form-control-alternative" readonly/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr class="my-4">
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Contact information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-city">City</label>
                                        <!--form1 Input for City-->
                                        <input type="text" id="input-city" name="city"
                                               class="form-control form-control-alternative"
                                               value="{{$account->city}}" readonly/>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-country">Country</label>
                                        <!--form1 Input for Country-->
                                        <input type="text" id="input-country" name="country"
                                               class="form-control form-control-alternative"
                                               value="{{$account->country}}" readonly/>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Date of Birth</label>
                                        <!--form1 Input for birthday-->
                                        <input type="" id="input-age" name="bOD"
                                               class="form-control form-control-alternative"
                                               value="{{$account->bOD}}" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <!-- Description -->
                        <h6 class="heading-small text-muted mb-4">About me</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <!--form1 description input-->
                                <textarea type="text" name="about" rows="4"
                                          class="form-control form-control-alternative"
                                          name="about"
                                          form="frm"
                                          readonly
                                >{{$account->about}}</textarea>
                            </div>
                        </div>
                        <!--form1 Submit for the form-->


                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end main-container -->
@include('layouts.footer');
