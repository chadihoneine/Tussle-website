<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>
@include('layouts.header')


<!-- Header -->

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
     style="min-height: 600px; background-image: url(/images/home_slider.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">Event view</h1>
                <p class="text-white mt-0 mb-5">This is view event page. You can see the details of the selected
                    event.</p>
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
                                <h2>
                                    Participants
                                </h2>

                                <div style="overflow-y: auto; max-height: 400px;">
                                    @foreach ($participants as $p)
                                        <?php
                                        $_FILES = $p->image;
                                        if ($_FILES == NULL) {
                                            $_FILES = 'images/penguinquestionmark.jpg';
                                        }
                                        ?>

                                        <div class="dropdown1" style=" width: 100%">
                                            <button class="dropbtn1 block1"
                                                    style="background-color:
                                                    <?php
                                                      if($p->accountID == Auth::user()->accountID){
                                                            echo '#148f77;';
                                                         }
                                                        else{
                                                            echo '#0b7dda;';
                                                            }
                                                        ?>

                                                     display: flex; justify-content: space-between;">
                                                <img alt="Image placeholder" class="avatar avatar-sm rounded-circle"
                                                     src="/{{$_FILES}}"> {{$p->username}}

                                                <?php
                                                if ($p->accountID == $event->accountID) {
                                                    echo '<p>&#128081;</p>';

                                                } else {
                                                    echo '<p></p>';
                                                }
                                                ?>
                                            </button>
                                            <div class="dropdown1-content">
                                                <a href="{{ route('profileview', ['id' => $p->accountID]) }}">View profile</a>
                                            </div>
                                        </div>
                                    @endforeach

                                    <br>
                                </div>
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
                            <h3 class="mb-0">Event information</h3>
                        </div>


                    </div>
                </div>
                <div class="card-body">


                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Title</label>
                                    <input readonly type="text" id="input-username"
                                           class="form-control form-control-alternative"
                                           placeholder="Time" value="{{$event->title}}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-username">Time</label>
                                    <input readonly type="text" id="input-username"
                                           class="form-control form-control-alternative"
                                           placeholder="Time" value="{{$event->time}}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Place</label>
                                    <input readonly type="email" id="input-email"
                                           class="form-control form-control-alternative"
                                           placeholder="Place" value="{{$event->place}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="input-first-name">Location</label>
                                    <input readonly type="text" id="input-first-name"
                                           class="form-control form-control-alternative"
                                           placeholder="Link to location"
                                           value="{{$event->location}}">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="form-control-label" for="input-last-name">Description</label>
                        </div>
                        <textarea disabled rows="5" cols="100"
                                  style="width: 100%">{{$event->description}}</textarea>
                    </div>
                    <hr class="my-4">
                    <!-- Address -->

                    {{--                    <button  class="button0 button3"  onclick="{{route('events.destroy', $event->eventID)}}">Delete event</button>--}}
                    @if($del == 1)
                        <form action="{{ route('events.destroy', $event->eventID) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="button0 button3 fas fa-trash fa-lg text-danger">Delete Event</i>
                            </button>
                        </form>
                    @endif
                    {{--                    participate--}}
                    @if($par == 1)
                        <form action="{{ route('event_participate') }}" method="POST">
                            @csrf
                            <button type="submit" name="eventID"
                                    title="participate" style="border: none; background-color:transparent;"
                                    value="{{$event->eventID}}">
                                <i class="button0 button3 fas fa-trash fa-lg text-danger">Participate</i>
                            </button>
                        </form>
                    @endif
                    {{--                    <input type="submit" class="button0 button1" value="Participate">--}}
                    {{--                    leave--}}
                    @if($lea == 1)
                        <form action="{{ route('event_leave') }}" method="POST">
                            @csrf
                            <button type="submit" name="eventID"
                                    title="leave" style="border: none; background-color:transparent;"
                                    value="{{$event->eventID}}">
                                <i class="button0 button3 fas fa-trash fa-lg text-danger">Leave</i>
                            </button>
                        </form>
                    @endif
                    {{--                    <input type="submit" class="button0 button2" value="Leave">--}}

                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main-container -->
@include('layouts.footer')

