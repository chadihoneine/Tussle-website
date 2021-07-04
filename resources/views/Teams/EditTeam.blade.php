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

        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Team's profile</h3>
                        </div>


                    </div>
                </div>
                <div class="card-body" style="width: 100%;">
                    <?php
                    $_FILES = $team->image;
                    if ($_FILES == NULL) {
                        $_FILES = '/images/penguinquestionmark.jpg';
                    }
                    ;?>
<!--                    -->
                        <img src="/{{$_FILES}}" class="rounded-circle" style="width: 200px; height: 200px">
                        <form action="{{ route('image.upload.post') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div >
                                    <input type="file" name="image" class="form-control">

                                    <input type="hidden" name="type" value="account" class="form-control">
                                    <input type="hidden" name="id" value="{{$team->teamID}}" class="form-control">                                </div>
                            </div>
                            <br>
                            <div class="row" style="width: 100%;display: block;text-align: center ">
                                <div>
                                    <button type="submit" class="button0 button1" style="width: 100%">Upload</button>
                                </div>
                            </div>

                            <br>


                        </form>
{{--                        --}}
                    <form action="{{ route('team.update', $team->teamID) }}" method="POST">
                        @csrf
                        @method('PUT')
{{--                        <img src="/{{$_FILES}}" alt="image" class="img-fluid rounded"--}}
{{--                             style="max-height: 300px;max-width: 300px">--}}

{{--                        <br><br>--}}

{{--                        <div class="row">--}}
{{--                            <div>--}}
{{--                                <input type="file" name="image" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <br><br><br>--}}


                        <h6 class="heading-small text-muted mb-4">Team information</h6>
                        <div class="pl-lg-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Team Name</label>

                                        <!--form1-->
                                        <input type="text" id="input-username" name="teamName"
                                               class="form-control form-control-alternative" placeholder="Title"
                                               value="{{$team->teamName}}">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="form-control-label" for="input-last-name">Description</label>
                            </div>
                            <textarea type="text" name="description" rows="4"
                                      class="form-control form-control-alternative"
                            >{{$team->description}}</textarea>
                        </div>
                        <hr class="my-4">
                        <!-- Address -->

                        <!--form1-->
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="button0 button2">Submit</button>
                        </div>
                    </form>


                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- end main-container -->

@include('layouts.footer')
