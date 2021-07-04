<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@include('Layouts.header')

<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>
<script src="https://kit.fontawesome.com/ccf8dd020a.js" crossorigin="anonymous"></script>


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

        <h1 style="align-self: center;padding: 20px">Search For a Team</h1>

        <form style="text-align: center" action="{{route('team_search')}}">
            <input type="text" class="form-control" placeholder="Search for one of the available tournaments"
                   name="teamName">
            <br>

            <select class="form-control" name="category">
                <option>Football</option>
                <option>BasketBall</option>
                <option>Programming</option>
                <option>Gaming</option>
            </select>
            <br>
            <input title="Search for teams using title or category" type="submit" class="button0 button2" value="Search" name="submit">
            <input title="Discover new teams with a specific category" type="submit" class="button0 button2" value="Suggest" name="submit">
        </form>

        <div class="card-body">
            <div class="text-center">
                @if(!empty($results))

                <hr>
                <h3>
                    Available Teams</span>
                </h3>
                <hr>
                <br>

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
                                    @if (!empty($results))
                                        @foreach($results as $i)
                                            <a class="anchor" href="/teamview/id={{$i->teamID}}">
                                                <div class="tournamentlist">
                                                    <div style="width: 33%">
                                                        <p style="display: flex">{{$i->teamName}}</p>
                                                    </div>
                                                    <div style="width: 33%">
                                                        <i class="fas fa-users"></i>
                                                        <p>{{$i->memcount}}</p>
                                                    </div>
                                                    <div style="width: 33%;text-align: right">
                                                        <p>{{$i->category}}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @else
                                    @endif


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
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@include('layouts.footer');
