<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@include('Layouts.header')

<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>
<script src="https://kit.fontawesome.com/ccf8dd020a.js" crossorigin="anonymous"></script>

<script>


    function showsolo() {
        var x = document.getElementById("sololist");
        var y = document.getElementById("arrow1");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.classList.remove('down');
            y.classList.toggle('up');
        } else {
            x.style.display = "none";
            y.classList.remove('up');
            y.classList.toggle('down');
        }

    }

    function shownonsolo() {
        var x = document.getElementById("nonsololist");
        var y = document.getElementById("arrow2");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.classList.remove('down');
            y.classList.toggle('up');
        } else {
            x.style.display = "none";
            y.classList.remove('up');
            y.classList.toggle('down');
        }

    }

    function shownew() {
        var x = document.getElementById("new");
        var y = document.getElementById("arrow3");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.classList.remove('down');
            y.classList.toggle('up');
        } else {
            x.style.display = "none";
            y.classList.remove('up');
            y.classList.toggle('down');
        }

    }

</script>

<style>

    .arrow {
        border: solid black;
        border-width: 0 3px 3px 0;
        display: inline-block;
        padding: 3px;
    }

    .down {
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
    }

    .up {
        transform: rotate(-135deg);
        -webkit-transform: rotate(-135deg);
    }

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

    .tournamentlist:focus {
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

    .float-container {
        border: 3px solid #fff;
        padding: 20px;
    }

    .float-child {
        width: 50%;
        float: left;
        padding: 20px;
        border: 0px solid;
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
                <p class="text-white mt-0 mb-5">This is the tournament page. You can a list of available tournaments and
                    their informations.</p>
            </div>
        </div>
    </div>
</div>


<div class=" order-xl-1" style="width: 100%">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row">
                <h3 class="mb-0"><b><big>Tournaments</big></b></h3>
            </div>
        </div>
        <div class="card-body">

            <form style="text-align: center" action="{{route('tournament_search')}}">
                <strong>Title</strong>
                <input type="text" class="form-control" placeholder="title"
                       name="title">
                <br>
                <strong>Place</strong>
                <input type="text" class="form-control" placeholder="place"
                       name="place">
                <br>
                <strong>Criteria</strong>
                <select class="form-control" name="issolo">
                    <option value="true">Solo</option>
                    <option value="false">Teams</option>
                </select>
                <br>
                <strong>Category</strong>
                <select class="form-control" name="category">
                    <option>Football</option>
                    <option>BasketBall</option>
                    <option>Programming</option>
                    <option>Gaming</option>
                </select>
                <br>
                <button class="button0 button2" type="submit">Search</button>
            </form>


            <hr>
            <br>
            @if(!empty($results))
                <?php $title = $_GET['title'];
                $place = $_GET['place'];?>
                <div class="text-center">
                    <h3>
                        List of Tournaments</span>
                    </h3>

                    <div class="wrapper">
                        <div class="form-group">
                            <div>
                                <div>
                                    <div class="tournamentlistrow" style="border-top: 1px solid black;">
                                        <div style="width: 25%;text-align: left">
                                            <b>Team Name </b>
                                        </div>
                                        <div style="width: 25%;text-align: center">
                                            <b>Members</b>
                                        </div>
                                        <div style="width: 25%;text-align: center">
                                            <b>Category</b>
                                        </div>
                                        <div style="width: 25%;text-align: right">
                                            <b>Place</b>
                                        </div>
                                    </div>


                                    <div>
                                        @foreach($results as $i)
                                            @if((!empty($title) && $i->title == $title) || (!empty($place) && $i->place == $place) || (empty($title) && empty($place)))
                                                <a class="anchor" href="/tournamentview/id={{$i->tournamentID}}">
                                                    <div class="tournamentlist">
                                                        <div style="width: 25%">
                                                            <p style="display: flex">{{$i->title}}</p>
                                                        </div>
                                                        <div style="width: 25%;text-align: center">
                                                            <i class="fas fa-users"></i>
                                                            <p>{{$i->memcount}}</p>
                                                        </div>
                                                        <div style="width: 25%;text-align: center">
                                                            <p>{{$i->category}}</p>
                                                        </div>
                                                        <div style="width: 25%;text-align: right">
                                                            <p>{{$i->place}}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @elseif(!empty($solo) && !empty($nonsolo))
                <div style="text-align: center">
                    {{--                    <div class="row" style="">--}}

                    <div class="col-1" style="text-align: center; padding: 5px">
                        <h3>
                            <button style="width: 100%" class="button0 button2" onclick="showsolo()"> List of Solo
                                Tournaments
                                <i class="arrow down" style="float: right" id="arrow1"></i>
                            </button>
                        </h3>
                        <div class="wrapper">
                            <div class="form-group" style="display: none" id="sololist">
                                <div>
                                    <div>
                                        <div class="tournamentlistrow" style="border-top: 1px solid black;">
                                            <div style="width: 25%;text-align: left">
                                                <b>tournament Name</b>
                                            </div>
                                            <div style="width: 25%;text-align: center">
                                                <b>Members</b>
                                            </div>
                                            <div style="width: 25%;text-align: center">
                                                <b>Category</b>
                                            </div>
                                            <div style="width: 25%;text-align: right">
                                                <b>Place</b>
                                            </div>
                                        </div>


                                        <div>

                                            @if (!empty($solo))
                                                @foreach($solo as $i)

                                                    <a class="anchor"
                                                       href="/tournamentview/id={{$i->tournamentID}}">
                                                        <div class="tournamentlist">
                                                            <div style="width: 33%">
                                                                <p style="display: flex">{{$i->title}}</p>
                                                            </div>
                                                            <div style="width: 33%;text-align: center">
                                                                <i class="fas fa-users"></i>
                                                                <p>{{$i->memcount}}</p>
                                                            </div>
                                                            <div style="width: 33%;text-align: center">
                                                                <p>{{$i->category}}</p>
                                                            </div>
                                                            <div style="width: 33%;text-align: right">
                                                                <p>{{$i->place}}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2" style="text-align: center;">
                        <h3>
                            <button class="button0 button2" style="width: 100%" onclick="shownonsolo()"><span>List of non Solo Tournaments</span><i
                                    id="arrow2" style="float: right" class="arrow down"></i></button>
                        </h3>
                        <div class="wrapper" style="display: none" id="nonsololist">
                            <div class="form-group">
                                <div>
                                    <div>
                                        <div class="tournamentlistrow" style="border-top: 1px solid black;">
                                            <div style="width: 25%;text-align: left">
                                                <b>tournament Name</b>
                                            </div>
                                            <div style="width: 25%">
                                                <b>Members</b>
                                            </div>
                                            <div style="width: 25%">
                                                <b>Category</b>
                                            </div>
                                            <div style="width: 25%;text-align: right">
                                                <b>Place</b>
                                            </div>
                                        </div>


                                        <div>
                                            @if (!empty($nonsolo))
                                                @foreach($nonsolo as $i)
                                                    <a class="anchor"
                                                       href="/tournamentview/id={{$i->tournamentID}}">
                                                        <div class="tournamentlist">
                                                            <div style="width: 33%">
                                                                <p style="display: flex">{{$i->title}}</p>
                                                            </div>
                                                            <div style="width: 33%">
                                                                <i class="fas fa-users"></i>
                                                                <p>{{$i->memcount}}</p>
                                                            </div>
                                                            <div style="width: 33%;text-align: center">
                                                                <p>{{$i->category}}</p>
                                                            </div>
                                                            <div style="width: 33%;text-align: right">
                                                                <p>{{$i->place}}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @else
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



{{--                    --}}
                    <div class="col-3" style="text-align: center;">
                        <h3>
                            <button class="button0 button2" style="width: 100%" onclick="shownew()"><span>List of new Tournaments</span><i
                                    id="arrow3" style="float: right" class="arrow down"></i></button>
                        </h3>
                        <div class="wrapper" style="display: none" id="new">
                            <div class="form-group">
                                <div>
                                    <div>
                                        <div class="tournamentlistrow" style="border-top: 1px solid black;">
                                            <div style="width: 25%;text-align: left">
                                                <b>tournament Name</b>
                                            </div>
                                            <div style="width: 25%">
                                                <b>Members</b>
                                            </div>
                                            <div style="width: 25%">
                                                <b>Category</b>
                                            </div>
                                            <div style="width: 25%;text-align: right">
                                                <b>Place</b>
                                            </div>
                                        </div>


                                        <div>
                                            @if (!empty($new))
                                                @foreach($new as $i)
                                                    <a class="anchor"
                                                       href="/tournamentview/id={{$i->tournamentID}}">
                                                        <div class="tournamentlist">
                                                            <div style="width: 33%">
                                                                <p style="display: flex">{{$i->title}}</p>
                                                            </div>
{{--                                                            <div style="width: 33%">--}}
{{--                                                                <i class="fas fa-users"></i>--}}
{{--                                                                <p>{{$i->memcount}}</p>--}}
{{--                                                            </div>--}}
                                                            <div style="width: 33%;text-align: center">
                                                                <p>{{$i->category}}</p>
                                                            </div>
                                                            <div style="width: 33%;text-align: right">
                                                                <p>{{$i->place}}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            @else
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @endif
</div>
</div>
</div>
@include('layouts.footer');
