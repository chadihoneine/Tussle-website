<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@include('layouts.header');

<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>
    <!-- Brand -->
    <!-- Form -->

    <!-- User -->
    <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">



                </div>
            </a>
        </li>
    </ul>
</div>
</nav>
<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(images/home_slider.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->

    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <p class="text-white mt-0 mb-5">This is the FAQ page. You can see the most asked questions by users.</p>
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
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <img src="images/penguinquestionmark.jpg" alt="Image" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">FAQ</h3>
                        </div>


                    </div>
                </div>
                <div class="card-body">
                    <big><b>What is the purpose of Tussle?</b></big><br>
                    Tussle offer the possibility to create events and to participate in tournaments<br>
                    <br>
                    <big><b>Is it possible to be part of a team?</b></big><br>
                    Yes! You can create your own team or request to join another team.<br>
                    <br>
                    <big><b>How does the level system works?</b></big><br>
                    The more a user participates and wins matches, the higher he will be ranked.<br>
                    <br>
                    <big><b>Can i modify the information of my profile page?</b></big><br>
                    Yes it is possible to do so in your profile page.<br>
                    <br>
                    <big><b>Can i kick a player from my team?</b></big><br>
                      Yes, but only if you are the team leader.<br>
                    <br>
                    <big><b>Who are the creators behind Tussle?</b></big><br>
                    Well some information about them are available if you click on the About us button^^.<br>
                    <br>
                    </p>
                    <!-- Description -->



                </div>
            </div>
        </div>
    </div>
</div>
</div> <!-- end main-container -->

</body>

@include('layouts.footer');
