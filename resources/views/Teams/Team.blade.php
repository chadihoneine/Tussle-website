<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>
@include('layouts.header')
<script>


    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }

    }

    function showsuggest() {
        var x = document.getElementById("suggestions");
        var y = document.getElementById("arrow1");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.classList.remove('down');
            y.classList.toggle('up');
            y.style.top = '8px';
        } else {
            x.style.display = "none";
            y.classList.remove('up');
            y.classList.toggle('down');
            y.style.top = '5px';
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


</style>


<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
     style="min-height: 600px; background-image: url(/images/home_slider.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->

    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">Hello {{Auth::user()->username}}</h1>
                <p class="text-white mt-0 mb-5">This is the Team page. You can see the informations about the selected
                    team.</p>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="wrapper">
                            <div class="form-group">
                                <div class="form-group">
                                    <h2>
                                        Members
                                    </h2>

                                    <div style="overflow-y: auto; max-height: 400px;">

                                        @foreach($members as $m)
                                            <?php
                                            $_FILES = $m->image;
                                            if ($_FILES == NULL) {
                                                $_FILES = 'images/penguinquestionmark.jpg';
                                            }
                                            ?>
                                            <div class="dropdown1" style=" width: 100%;">


                                                <button class="dropbtn1 block1"
                                                        style="background-color:
                                                        <?php
                                                        if ($m->accountID == Auth::user()->accountID) {
                                                            echo '#148f77;';
                                                        } else {
                                                            echo '#0b7dda;';
                                                        }
                                                        ?>

                                                            display: flex; justify-content: space-between;text-align: center;">
                                                    <img alt="Image placeholder" class="avatar avatar-sm rounded-circle"
                                                         src="/{{$_FILES}}">
                                                    {{$m->username}}
                                                    <?php
                                                    if ($m->accountID == $team->accountID) {
                                                        echo '<p>&#128081;</p>';

                                                    } else {
                                                        echo '<p></p>';
                                                    }
                                                    ?>
                                                </button>
                                                <div class="dropdown1-content">
                                                    <a href="{{ route('profileview', ['id' => $m->accountID]) }}">View
                                                        profile</a>
                                                    @if($team->accountID == Auth::user()->accountID)
                                                        <form action="{{ route('team_kick') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="accountID"
                                                                   value="{{$m->accountID}}">
                                                            <input type="hidden" name="teamID"
                                                                   value="{{$team->teamID}}">
                                                            <button type="submit">Kick User</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach

                                        <br>
                                    </div>
                                </div>

                                @if($team->accountID == Auth::user()->accountID)
                                    <br>

                                    <h2>
                                        User request
                                    </h2>




                                    <div style="overflow-y: auto; max-height: 400px;">


                                        @foreach($requests as $m)
                                            <?php
                                            $_FILES = $m->image;
                                            if ($_FILES == NULL) {
                                                $_FILES = 'images/penguinquestionmark.jpg';
                                            }
                                            ?>

                                            <div class="dropdown1" style=" width: 100%">
                                                <button class="dropbtn1 block1"
                                                        style="background-color: #3e8e41;display: flex; justify-content: space-between;">
                                                    <img alt="Image placeholder" class="avatar avatar-sm rounded-circle"
                                                         src="/{{$_FILES}}"> {{$m->username}}
                                                    <p></p>
                                                </button>
                                                <div class="dropdown1-content">
                                                    <a href="{{ route('profileview', ['id' => $m->accountID]) }}">View
                                                        profile</a>
                                                    {{--                                                <a href="{{ route('team_participate', ['id' => $team->teamID]) }}">Accept request</a>--}}
                                                    @if($team->accountID == Auth::user()->accountID)
                                                        <form action="{{ route('team_participate') }}" method="POST"
                                                              id="form1">
                                                            @csrf
                                                            <input type="hidden" value="{{$team->teamID}}"
                                                                   name="teamID"/>
                                                            <input type="hidden" value="{{$m->accountID}}"
                                                                   name="accountID"/>
                                                            <a href="#"
                                                               onclick="document.getElementById('form1').submit();">accept
                                                                request</a>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach

                                        <br>
                                    </div>
                                @endif
                                <br>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h1><big><big>{{$team->teamName}}</big></big></h1>

                        </div>
                        @if($team->accountID == \Illuminate\Support\Facades\Auth::user()->accountID)
                            <button style="" class="button0 button2" onclick="myFunction()" value="">
                                Invite User
                            </button>

                        @endif
                        <a class="button0 button2"
                           href="http://127.0.0.1:8000/home/user=<?php echo \Illuminate\Support\Facades\Auth::user()->accountID; ?>">
                            Go to my chat</a>

                        <div id="myDIV" style="display: none;width: 100%;text-align: center; padding:25px">

                            <form action="{{ route('teaminvitation') }}" method="POST" id="frm" style="width:100%">
                                @csrf
                                <hr>
                                <input name="username" value="" class="form-control" placeholder="enter username"/>
                                <br>
                                <input type="hidden" name="elink" value="{{$team->teamID}}"
                                       placeholder="enter event link"/>
                                <button type="submit" class="btn btn-primary">Send Invite</button>
                                <hr>
                            </form>
                            <button onclick="showsuggest()" type="" class="button0 button2" style="width: 70%">Suggestions
                                <i class="arrow down" style="float: right;position: relative;top: 5px" id="arrow1"></i></button>
                            <div id="suggestions"  style="display: none;width: 100%;text-align: center;">

                                <br>
                                <div style="">
                                    <br>
                                    @foreach($suggest as $s)
                                        <div type="submit" style="display:inline-block;background-color: #c8cbcf;width: 70%;padding: 0px;border: 2px black solid">
                                            <a style="width: 70%;height:100%;float: left" href="/profileview/id={{$s->accountID}}">{{$s->username}}</a>
                                            <form action="{{ route('teaminvitation') }}" method="POST">
                                                @csrf
                                                <button name="accountID" value="{{$s->accountID }}" type="submit" style="width: 30%;height:100%;float: right;border-left: black solid 2px; border: none">
                                                    invite
                                                </button>
                                            </form>

                                        </div>
                                        <br>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="width: 100%">


                    <?php
                    $_FILES = $team->image;
                    if ($_FILES == NULL) {
                        $_FILES = '/images/penguinquestionmark.jpg';
                    }
                    ?>
                    <img src="{{$_FILES}}" alt="Image" class="img-fluid rounded"
                         style="max-height: 300px;max-width: 300px">

                    <br><br><br><br>

                    <div class="" style="width: 100%">
                        <h3 class="mb-0">Team description</h3>
                        <textarea type="text" name="description" rows="4"
                                  class="form-control form-control-alternative"
                                  form="frm"
                                  placeholder="Write a small description about your team and state the regulations"
                        >{{$team->description}}</textarea>
                    </div>
                    <br><br>

                    <div>
                        @if($ismember == 1)
                            <form action="{{ route('team_leave') }}" method="POST">
                                @csrf
                                <button type="submit" name="teamID"
                                        title="leave" style="border: none; background-color:transparent;"
                                        value="{{$team->teamID}}">
                                    <i class="button0 button3 fas fa-lg text-danger">Leave</i>
                                </button>
                            </form>
                        @endif


                        @if($team->accountID == \Illuminate\Support\Facades\Auth::user()->accountID)
                            <a href="{{ route('team.edit', $team->teamID) }}" class="button0 button2">
                                <i class="fas fa-lg">Edit Team</i>
                            </a>
                        @endif
                        @if($ismember == 0)
                            <form action="{{ route('team_join_request') }}" method="POST">
                                @csrf
                                <button type="submit" name="teamID"
                                        title="leave" style="border: none; background-color:transparent;"
                                        value="{{$team->teamID}}">
                                    <i class="button0 button3 fas fa-trash fa-lg text-danger">Request to join team</i>
                                </button>
                            </form>
                        @endif


                        {{--                        <button type="submit" class="button button3" style="margin-right: 20px" onclick="{{route('team_leave')}}">Leave team</button>--}}
                        {{--                        <button class="button button2" style="margin-right: 20px">Add user</button>--}}
                        {{--                        <button class="button button1" style="margin-right: 20px">Request to join team</button>--}}
                    </div>
                    <br>

                    {{--                    <h3 class="mb-0">Teams Chat</h3>--}}
                    {{--                    <a href="http://127.0.0.1:8000/home/user=<?php echo \Illuminate\Support\Facades\Auth::user()->accountID; ?>">--}}
                    {{--                        go to my chat</a>--}}
                    {{--                    <br><br>--}}
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- end main-container -->

@include('layouts.footer')
