<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@include('layouts.header');

<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>

<style>

    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default radio button */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 6px;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #eee;
        border-radius: 3px;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .container input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .container .checkmark:after {
        top: 6px;
        left: 6px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }

    .radio-label {
        padding-bottom: 50px;
    }

    hr {
        background-color: #172b4d;
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
                <p class="text-white mt-0 mb-5">This is the terms and conditions page. Below you will see information
                    related to that.</p>
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

                <h1 style="padding-left: 25px">Survey Form</h1>
            </div>
        </div>
        <div class="card-body" style="width: 100%">


            <section class="sample-text-area" style="width: 100%">
                <div class="container" style="width: 100%;padding: 0px">


                    <form action="{{ route('survey.store') }}" method="POST" id="frm">
                        <input type="hidden" name="surveyID" value="{{$survey->surveyID}}">
                        @csrf
                        @foreach($questions as $q)
                            <?php
                            $choices = explode(", ", $q->choices);
                            ?>
                            <div style="padding-bottom: 5px;width: 100%;">
                                <strong class="radio-label">{{$q->question}}</strong>
                                <br>
                                <div style="padding-left: 30px;padding-top: 0px">
                                    @foreach($choices as $c)
                                        <label class="container">{{$c}}
                                            <input class="checkbox" type="radio" name="{{$q->questionID}}"
                                                   value="{{$c}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        <button type="submit" class="button0 button2" style="border-radius: 5px">Submit Form
                        </button>
                    </form>


                </div>


            </section>

        </div>


    </div>

</div>
<br> <br> <br>

@include('layouts.footer');
</body>
