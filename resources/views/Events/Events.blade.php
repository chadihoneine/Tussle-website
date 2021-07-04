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

</script>
<style>
    .block1 {
        padding: 5px;
        width: 90%;
        border-radius: 5px;
        border: 0px;
    }

    .block1 div {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
</style>

<script>

    function Clipboard_CopyTo(value) {
        var tempInput = document.createElement("input");
        tempInput.value = value;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
    }

</script>

<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
     style="min-height: 600px; background-image: url(images/home_slider.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->

    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">Hello {{\Illuminate\Support\Facades\Auth::user()->username}}</h1>
                <p class="text-white mt-0 mb-5">This is your events page. You can create events, check their
                    informations, delete them and see your events history.</p>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
    <div class="row">
        {{--        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">--}}
        {{--            <div class="card card-profile shadow">--}}
        {{--                <div class="card-body pt-0 pt-md-4">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="col">--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="text-center">--}}
        {{--                        <h3>--}}
        {{--                            Ongoing events</span>--}}
        {{--                        </h3>--}}

        {{--                        <div class="wrapper">--}}
        {{--                            <div class="form-group">--}}

        {{--                                <div style="overflow-y: auto; max-height: 500px">--}}
        {{--                                    @foreach ($events as $e)--}}
        {{--                                        <div name="Ongoing event">--}}
        {{--                                            <div class="dropdown1" style="width: 100%;text-align: center">--}}
        {{--                                                <button class="dropbtn1 block1"--}}
        {{--                                                        style="background-color: #0b7dda;justify-content: space-evenly">--}}
        {{--                                                    <div>--}}
        {{--                                                        <p>Title:</p>--}}
        {{--                                                        <p>{{$e->title}}</p>--}}
        {{--                                                        <p></p>--}}
        {{--                                                    </div>--}}
        {{--                                                    <div>--}}
        {{--                                                        <p>Time:</p>--}}
        {{--                                                        <p>{{$e->time}}</p>--}}
        {{--                                                        <p></p>--}}
        {{--                                                    </div>--}}

        {{--                                                </button>--}}
        {{--                                                <div class="dropdown1-content"--}}
        {{--                                                     style="position: relative;width: 50%">--}}
        {{--                                                    <a href="{{ route('eventview', ['id' => $e->eventID]) }}">View--}}
        {{--                                                        event</a>--}}
        {{--                                                    <a href="#"--}}
        {{--                                                       onclick="Clipboard_CopyTo('{{route('eventview', ['id' => $e->eventID])}}')">Get--}}
        {{--                                                        link</a>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                        <br>--}}
        {{--                                    @endforeach--}}
        {{--                                    <br>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{----}}
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
                                        Ongoing events
                                    </h2>

                                    <div style="overflow-y: auto; max-height: 400px;">

                                        @foreach ($events as $e)
                                            <div name="Ongoing event">
                                                <div class="dropdown1" style="width: 100%;text-align: center">
                                                    <button class="dropbtn1 block1"
                                                            style="background-color: #0b7dda;justify-content: space-evenly">
                                                        <div>
                                                            <p>Title:</p>
                                                            <p>{{$e->title}}</p>
                                                            <p></p>
                                                        </div>
                                                        <div>
                                                            <p>Time:</p>
                                                            <p>{{$e->time}}</p>
                                                            <p></p>
                                                        </div>

                                                    </button>
                                                    <div class="dropdown1-content"
                                                         style="position: relative;width: 50%">
                                                        <a href="{{ route('eventview', ['id' => $e->eventID]) }}">View
                                                            event</a>
                                                        @if($e->private == "no" || $e->accountID == \Illuminate\Support\Facades\Auth::user()->accountID)
                                                        <a href="#"
                                                           onclick="Clipboard_CopyTo('{{route('eventview', ['id' => $e->eventID])}}')">Get
                                                            link</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        @endforeach

                                        <br>
                                    </div>
                                </div>

                                {{--                                @if($team->accountID == Auth::user()->accountID)--}}
                                {{--                                    <br>--}}

                                <h2>
                                    Public events
                                </h2>


                                <div style="overflow-y: auto; max-height: 400px;">


                                    @foreach ($pubevents as $e)
                                        <div name="Ongoing event">
                                            <div class="dropdown1" style="width: 100%;text-align: center">
                                                <button class="dropbtn1 block1"
                                                        style="background-color: #0b7dda;justify-content: space-evenly">
                                                    <div>
                                                        <p>Title:</p>
                                                        <p>{{$e->title}}</p>
                                                        <p></p>
                                                    </div>
                                                    <div>
                                                        <p>Time:</p>
                                                        <p>{{$e->time}}</p>
                                                        <p></p>
                                                    </div>

                                                </button>
                                                <div class="dropdown1-content"
                                                     style="position: relative;width: 50%">
                                                    <a href="{{ route('eventview', ['id' => $e->eventID]) }}">View
                                                        event</a>
                                                    <a href="#"
                                                       onclick="Clipboard_CopyTo('{{route('eventview', ['id' => $e->eventID])}}')">Get
                                                        link</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach

                                    <br>
                                </div>
                                {{--                                @endif--}}
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
                    {{--            --}}
                    <button name="reportedID" title="leave" style="" class="button0 button1"
                            onclick="myFunction()"
                            value="">
                        Invite User
                    </button>
                    <form action="{{ route('eventinvitation') }}" method="POST">
                        @csrf
                        <div id="myDIV" style="display: none;">
                            <input name="username" value="" placeholder="Enter username"/>
                            <input name="elink" value="" placeholder="Enter event link"/>
                            <button type="submit" class="button0 button2">Submit</button>
                        </div>
                    </form>
                    {{--            --}}
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Create your events</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <!--BOOKMARK-->
                    <!--search form1 to find the inputs related to this form-->
                    <form action="{{ route('events.store') }}" method="POST" id="frm">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Event information</h6>
                        <div class="pl-lg-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Title</label>

                                        <!--form1-->
                                        <input type="text" id="input-username" name="title"
                                               class="form-control form-control-alternative" placeholder="Title"
                                               value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Time</label>

                                        <!--form1-->
                                        <input type="datetime-local" id="input-username" name="time"
                                               class="form-control form-control-alternative" placeholder="Time"
                                               value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Place</label>

                                        <!--form1-->
                                        <input type="text" id="input-email" name="place"
                                               class="form-control form-control-alternative" placeholder="Place">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-first-name">Location</label>

                                        <!--form1-->
                                        <input type="text" id="input-first-name" name="location"
                                               class="form-control form-control-alternative"
                                               placeholder="Link to location" value="">
                                    </div>
                                </div>
                            </div>
                            <strong>Private</strong>
                            <select class="form-control" name="private">
                                <option value="yes">yes</option>
                                <option value="no">no</option>
                            </select>
                            <div>
                                <label class="form-control-label" for="input-last-name">Description</label>
                            </div>
                            <textarea type="text" name="description" rows="4"
                                      class="form-control form-control-alternative"
                                      form="frm"
                                      placeholder="Write a small description about your event"></textarea>
                        </div>
                        <hr class="my-4">
                        <!-- Address -->

                        <!--form1-->
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="button0 button2">Submit</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end main-container -->
@include('layouts.footer')
