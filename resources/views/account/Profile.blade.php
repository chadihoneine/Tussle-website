<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@include('Layouts.header')
{{--@extends('layouts.app')--}}
<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>

<div class="main-content">

<?php
$birthDate = Auth::user()->bOD;
$tz = new DateTimeZone('Europe/Brussels');
$age = DateTime::createFromFormat('Y-m-d', $birthDate, $tz)
    ->diff(new DateTime('now', $tz))
    ->y;


$_FILES = Auth::user()->image;
if ($_FILES == NULL) {
    $_FILES = '/images/penguinquestionmark.jpg';
}
;?>


<!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="min-height: 600px; background-image: url({{ url('/images/home_slider.jpg') }}); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="text-white"><big><big>Hello {{ Auth::user()->username }} </big></big></h1>
                    <p class="text-white mt-0 mb-5">This is your profile page. You can see your information and edit
                        them.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                {{--                                @if ($message = Session::get('success'))--}}
                                {{--                                    <div class="alert alert-success alert-block">--}}
                                {{--                                        <button type="button" class="close" data-dismiss="alert">×</button>--}}
                                {{--                                        <strong>{{ $message }}</strong>--}}
                                {{--                                    </div>--}}
                                {{--                                    <img src="images/{{ Session::get('image') }}">--}}
                                {{--                                @endif--}}



                                    <img src="<?php echo $_FILES; ?>" class="rounded-circle" style="width: 200px; height: 200px">

                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">


                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row" >
                            <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div >
                                        <form action="{{ route('image.upload.post') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div >
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row" style="width: 100%;display: block;text-align: center ">
                                                <div>
                                                    <button type="submit" class="button0 button1" style="width: 100%">Upload</button>
                                                </div>
                                            </div>

                                            <br>


                                        </form>

                                        {{--                                            <form action="{{}}" method="POST">--}}
                                        {{--                                            @csrf @method('PUT')--}}
                                        {{--                                            <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>--}}
                                        {{--                                            <p><label for="file" style="cursor: pointer; color:Blue">Upload Image</label>--}}
                                        {{--                                                <button type="submit" class="btn btn-primary">upload</button></p>--}}
                                        {{--                                        </form>--}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="text-center">
                            <h3>
                                {{Auth::user()->username}}, {{$age}}
                            </h3>
                            <h3>
                                {{Auth::user()->f_name}} {{Auth::user()->l_name}}
                            </h3>
                            <div class="h5 font-weight-300" mt-3>
                                <?php echo Auth::user()->country;?>, <?php echo Auth::user()->city; echo " ";?>
                            </div>
                            <div class="h5 mt-3">
                                {{Auth::user()->email}}
                            </div>

                            <hr class="my-4">
                            <p>{{ Auth::user()->about }}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                            <form action="{{ route('account.destroy', \Illuminate\Support\Facades\Auth::user()->accountID) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button0 button3">Delete account</button>
                            </form>

                        </div>
                    </div>
                    <div class="card-body">


                        <form id="frm"
                              action="{{ route('account.update', \Illuminate\Support\Facades\Auth::user()) }}"
                              method="POST">
                            @csrf
                            @method('PUT')
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <!--form1 Input for user name-->
                                            <input type="text" id="input-username" name="username"
                                                   class="form-control form-control-alternative"
                                                   placeholder="<?php echo Auth::user()->username;?>"
                                                   value="<?php echo Auth::user()->username;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <!--form1 Input for user Email-->
                                            <input type="email" id="input-email" name="email"
                                                   value="<?php echo Auth::user()->email;?>"
                                                   class="form-control form-control-alternative"
                                                   placeholder="<?php echo Auth::user()->email;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-first-name">First name</label>
                                            <!--form1 Input for user First Name-->
                                            <input type="text" id="input-first-name"
                                                   class="form-control form-control-alternative" name="f_name"
                                                   placeholder="<?php echo Auth::user()->f_name;?>"
                                                   value="<?php echo Auth::user()->f_name;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-last-name">Last name</label>
                                            <!--form1 Input for last name-->
                                            <input type="text" id="input-last-name"
                                                   class="form-control form-control-alternative" name="l_name"
                                                   placeholder="<?php echo Auth::user()->l_name;?>"
                                                   value="<?php echo Auth::user()->l_name;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-last-name">Password</label>
                                            <!--form1 Input for last name-->
                                            <input type="password"
                                                   class="form-control form-control-alternative" name="password"
                                                   value="{{Auth::user()->password}}">
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
                                                   placeholder="<?php echo Auth::user()->city;?>"
                                                   value="<?php echo Auth::user()->city;?>"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-country">Country</label>
                                            <!--form1 Input for Country-->
                                            <input type="text" id="input-country" name="country"
                                                   class="form-control form-control-alternative"
                                                   placeholder="<?php echo Auth::user()->country;?>"
                                                   value="<?php echo Auth::user()->country;?>"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Date of Birth</label>
                                            <!--form1 Input for birthday-->
                                            <input type="date" id="input-age" name="bOD"
                                                   class="form-control form-control-alternative"
                                                   placeholder="<?php echo Auth::user()->bOD;?>"
                                                   value="<?php echo Auth::user()->bOD;?>"/>
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
                                    ><?php echo Auth::user()->about;?></textarea>
                                </div>
                            </div>
                            <!--form1 Submit for the form-->
                            <button type="submit" class="button0 button2">Submit</button>
                        </form>

                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end main-container -->
@include('layouts.footer');
