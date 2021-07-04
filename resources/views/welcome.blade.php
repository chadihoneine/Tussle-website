<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@include('layouts.header')

<script>


    var slideIndex = 1;
    var myVar = setInterval(plusSlidesnew, 5000);
    window.onload = function () {
        showSlides(slideIndex);
    }

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function plusSlidesnew(){
        plusSlides(1);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }



</script>


<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>

<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(images/home_slider.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->

    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                @auth()
                    <h1 style="color: white"><big>Hello {{Auth::user()->username}}</big></h1>
                @endauth
                <p class="text-white mt-0 mb-5">This is the homepage page. Below you will see some useful information</p>
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

                    <h1>Homepage</h1>

                </div>


            </div>
        </div>
        <div class="card-body" style="width: ">


            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 4</div>
                    <img src="images/football.jpg" style="width:100%;border-top-left-radius: 20px;border-top-right-radius: 20px;">
                    <div class="text-slide"><h3>Discover new hobbies including football, basketball, gaming, etc...</h3></div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 4</div>
                    <img src="images/basketball2.jpg" style="width:100%;border-top-left-radius: 20px;border-top-right-radius: 20px;">
                    <div class="text-slide"><h3>Create, share events, and go out with your friends.</h3></div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 4</div>
                    <img src="images/gaming.jpg" style="width:100%;border-top-left-radius: 20px;border-top-right-radius: 20px;">
                    <div class="text-slide"><h3>Join a team and meet people who share your hobby.</h3></div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 4</div>
                    <img src="images/competition.jpg" style="width:100%;border-top-left-radius: 20px;border-top-right-radius: 20px;">
                    <div class="text-slide"><h3>Participate in tournaments. Compete by yourself or with your team.</h3></div>
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot-slide" onclick="currentSlide(1)"></span>
                <span class="dot-slide" onclick="currentSlide(2)"></span>
                <span class="dot-slide" onclick="currentSlide(3)"></span>
                <span class="dot-slide" onclick="currentSlide(4)"></span>
            </div>


            <br><br>
        </div>
    </div>
</div>


@include('layouts.footer')
</body>
