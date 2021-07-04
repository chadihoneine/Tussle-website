<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@include('Layouts.header')
{{--@extends('layouts.app')--}}
<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>
<script src="https://kit.fontawesome.com/ccf8dd020a.js" crossorigin="anonymous"></script>

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
<style>
    .tournamentlist {
        background-color: #e5e7e9;
        padding: 20px;
        border-bottom: 1px solid black;
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .tournamentlist:hover {
        background-color: #cacfd2;
    }

    .tournamentlistrow {
        background-color: #e5e7e9;
        padding: 20px;
        border-bottom: 1px solid black;
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .anchor {
        text-decoration: none;
        color: black;
    }

    .anchor:hover {
        text-decoration: none;
        color: black;
    }

    .anchor:focus {
        text-decoration: none;
        color: black;
    }
    .button-panel{
        display: flex;
        text-align: end;
    }
    .panel-item{
        flex: 1 1 0px
    }

</style>
<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
     style="min-height: 600px; background-image: url(images/home_slider.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->

    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">{{Auth::user()->username}}</h1>
                <p class="text-white mt-0 mb-5">This is the Teams List page, you can access your teams from here.</p>
            </div>
        </div>
    </div>
</div>


<div class=" order-xl-1" style="width: 100%">
    <div class="card bg-secondary shadow">

        <div class="card-body">
            <div class="text-center">

                <hr>
                <h3>
                    Your Teams
                </h3>
                <hr>

                <div class="button-panel">
                    <a href="/TeamSearch" class="panel-item">
                        <button class="button1 button0 " style="border-radius: 5px;min-width: 50%;">Find a New Team</button>
                    </a>
                    <a href="/CreateTeam" class="panel-item" style="text-align: left">
                        <button class="button1 button0" style="border-radius: 5px; min-width: 50%;">Create a New Team</button>
                    </a>

                </div>
                <br><br>

                <div class="wrapper">
                    <div class="form-group">

                        <div>

                            <div class="tournamentlistrow" style="border-top: 1px solid black;">
                                <div style="width: 33%;text-align: left">
                                    <b>Team Name</b>
                                </div>
                                <div style="width: 33%">
                                    <b>Members</b>
                                </div>
                                <div style="width: 33%;text-align: right">
                                    <b>Category</b>
                                </div>
                            </div>

                            <div>

                                @foreach($team as $t)
                                    <a class="anchor" href="/teamview/id={{$t->teamID}}">
                                        <div class="tournamentlist">
                                            <div style="width: 33%">
                                                <p style="display: flex">{{$t->teamName}}</p>
                                            </div>
                                            <div style="width: 33%">
                                                <i class="fas fa-users"></i>
                                                <p>{{$t->memcount}}</p>
                                            </div>
                                            <div style="width: 33%;text-align: right">
                                                <p>{{$t->category}}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                                {{--                            <div class="tournamentlist">--}}
                                {{--                                <div style="width: 33%">--}}
                                {{--                                    <p style="display: flex">Team 1 asdfasdf</p>--}}
                                {{--                                </div>--}}
                                {{--                                <div style="width: 33%">--}}
                                {{--                                    <i class="fas fa-users"></i>--}}
                                {{--                                    <p>50/60</p>--}}
                                {{--                                </div>--}}
                                {{--                                <div style="width: 33%;text-align: right">--}}
                                {{--                                    <p>Basketball</p>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}

                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('layouts.footer');
