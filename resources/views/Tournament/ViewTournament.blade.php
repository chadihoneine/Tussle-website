<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@include('Layouts.header')

<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>

<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
     style="min-height: 600px; background-image: url(/images/home_slider.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->

    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">Tournament view</h1>
                <p class="text-white mt-0 mb-5">This is tournament view page. You can see the details of the selected
                    tournament.</p>
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


                    <div class="wrapper">
                        <div class="form-group">
                            <h2>
                                Participants
                            </h2>

                            <div style="overflow-y: auto; max-height: 400px;">
                                @if($ns == "0")
                                    @foreach($members as $m)
                                        <?php
                                        $_FILES = $m->image;
                                        if ($_FILES == NULL) {
                                            $_FILES = 'images/penguinquestionmark.jpg';
                                        }
                                        ?>
                                        <div class="dropdown1" style=" width: 100%">
                                            <button class="dropbtn1 block1"
                                                    style="background-color: #0b7dda; justify-content: space-between;">
                                                <img alt="Image placeholder" class="avatar avatar-sm rounded-circle"
                                                     src="/{{$_FILES}}">
                                                {{$m->username}}
                                            </button>
                                            <div class="dropdown1-content">
                                                <a href="{{ route('profileview', ['id' => $m->accountID]) }}">View
                                                    profile</a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach($members as $m)
                                        <div class="dropdown1" style=" width: 100%">
                                            <button class="dropbtn1 block1"
                                                    style="background-color: #0b7dda; justify-content: space-between;">
                                                {{$m->teamName}}
                                            </button>
                                            <div class="dropdown1-content">
                                                <a href="{{ route('teamview', ['id' => $m->teamID]) }}">View
                                                    team</a>
                                            </div>
                                        </div>
                                    @endforeach
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
                            <h3 class="mb-0">{{$tournament->title}}</h3>
                        </div>


                    </div>
                </div>
                <div class="card-body">
                    <div class="pl-lg-4">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Category:</label>
                                    <input readonly type="text" id="input-first-name"
                                           class="form-control form-control-alternative"
                                           placeholder="Link to location" value="{{$tournament->category}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-first-name">Time:</label>
                                    <input readonly type="text" id="input-first-name"
                                           class="form-control form-control-alternative"
                                           placeholder="Link to location" value="{{$tournament->time}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">


                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-first-name">Place:</label><br>
                                    <small>&nbsp;</small>
                                    <input readonly type="text" id="input-first-name"
                                           class="form-control form-control-alternative"
                                           placeholder="Link to location" value="{{$tournament->place}}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-first-name">Criteria:</label><br>
                                    <small>(This specifies if you can join alone or should be a part of a
                                        team)</small>
                                    <input readonly type="text" id="input-first-name"
                                           class="form-control form-control-alternative"
                                           placeholder="solo or team" value="{{$tournament->issolo}}">
                                </div>
                            </div>

                        </div>
                        <div>
                            <label class="form-control-label" for="input-last-name">Description:</label>
                        </div>
                        <textarea readonly rows="5" cols="100"
                                  style="width: 100%">{{$tournament->description}}</textarea>
                    </div>
                    <hr class="my-4">
                    <!-- Address -->
                    @if($ismember == 1)
                        {{--                        <button type="submit" class="button0 button1">leave</button>--}}
                        <form action="{{ route('tournament_leave') }}" method="POST" id="form1">
                            @csrf
                            <input type="hidden" value="{{$tournament->tournamentID}}" name="tournamentID"/>
                            <input type="hidden" value="{{$participatingteam}}" name="participatingteam"/>
                            {{--                            <input type="hidden" value="{{Auth::user()->accountID}}" name="accountID"/>--}}
                            {{--                                    <a class="button0 button2" onclick="document.getElementById('form1').submit();">participate</a>--}}
                            <button type="submit" class="button0 button2">leave</button>
                        </form>
                    @else
                        @if($tournament->issolo == 'true')
                            {{--                                <input type="submit" class="button0 button2" value="Participate">--}}
                            <form action="{{ route('tournament_participate') }}" method="POST" id="form1">
                                @csrf
                                <input type="hidden" value="{{$tournament->tournamentID}}" name="tournamentID"/>
                                <input type="hidden" value="{{Auth::user()->accountID}}" name="accountID"/>
                                {{--                                    <a class="button0 button2" onclick="document.getElementById('form1').submit();">participate</a>--}}
                                <button type="submit" class="button0 button1">Participate</button>
                            </form>
                        @else
                            <div class="dropdown1">
                                <button class="button0 button3">Participate as a team</button>
                                <div class="dropdown1-content">
                                    <form action="{{ route('tournament_participate') }}" method="POST"
                                          id="form1">
                                        @csrf
                                        @foreach($team as $t)
                                            {{--                                            <a href="/teamview/id={{$t->teamID}}">{{$t->teamName}}</a>--}}
                                            <input type="hidden" value="{{$tournament->tournamentID}}"
                                                   name="tournamentID"/>
                                            {{--                                            <input type="hidden" value="{{$t->teamID}}"--}}
                                            {{--                                                   name="accountID"/>--}}
                                            <input name="accountID" class="button0 button2" type="submit" value="{{$t->teamID}}">{{$t->teamName}}{{$t->teamID}}</input>
                                        @endforeach
                                    </form>

                                </div>
                            </div>
                        @endif
                    @endif
                    <br>
                    <br>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- end main-container -->

@include('layouts.footer');
