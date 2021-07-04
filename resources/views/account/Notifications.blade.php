<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@include('layouts.header')
<style>
    .tournamentlist {
        background-color: #e5e7e9;
        border-bottom: 1px solid black;
        display: flex;
        justify-content: space-between;

    }


    .tournamentlistrow {
        background-color: #e5e7e9;
        border-bottom: 1px solid black;
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .tournamentlist div {
        border-right: 1px solid black;
        height: 100%;
        padding-top: 20px;
        padding-bottom: 10px;
        text-align: center;
    }

    .tournamentlistrow div {
        border-right: 1px solid black;
        height: 100%;
        padding-top: 20px;
        padding-bottom: 10px;
        text-align: center;
    }

    .delete {
        background: none;
        border: none;
        text-decoration: none;
        color: red;
    }
    .delete:hover{
        text-decoration: red underline;
    }


</style>


<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>
<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
     style="min-height: 600px; background-image: url(images/home_slider.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->

    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h3 style="color: white">This is the notification page, you can see all your notifications bellow.
                    related to that.</h3>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">


        </div>
    </div>
</div>
<div class="col-xl-8 order-xl-1" style="max-width: 100%">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">

                    <h1>Notifications</h1>

                </div>


            </div>
        </div>
        <div class="card-body">


            <div style="border-left: black solid 1px;">

                <div class="tournamentlistrow" style="border-top: 1px solid black;">

                    <div style="width: 60%;">
                        <b>Notification</b>
                    </div>
                    <div style="width: 40%;">
                        <b>Date - Time</b>
                    </div>
                </div>
                @foreach($notifications as $n)
                <div class="tournamentlist">
                    <div style="width: 60%">
                        <p>{{$n->message}}, <a href="{{$n->href}}">go to {{$n->activity}}</a></p>
                    </div>
                    <div style="width: 40%;">
                        <p>{{$n->date}}</p>
                    </div>
                </div>
                @endforeach



            </div>
        </div>

    </div>
    <br><br>
</div>


</div>


@include('layouts.footer');
