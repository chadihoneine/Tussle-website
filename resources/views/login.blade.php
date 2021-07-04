<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>


</head>

<body>
@include('layouts.header')

<div class="main-content">
    <!-- Top navbar -->

    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="min-height: 600px; background-image: url({{ url('/images/home_slider.jpg') }}); background-size: cover; background-position: center top;">
        <!-- Mask -->

        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white">Welcome!</h1>
                    <p class="text-white mt-0 mb-5">This is the Login page. You can login to your account here.</p>
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
    <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><b><big>Login</big></b></h3>
                    </div>


                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" placeholder="Enter Username" name="email" class="form-control p_input"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" placeholder="Enter Password" name="password"
                                   class="form-control p_input" required>
                        </div>


                        <button type="submit" class="button0 button1">Login</button>


                        <p class="sign-up">Don't have an Account?<a href="{{ route('account.create') }}"> Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
<!-- end main-container -->
<br>
<br>
@include('layouts.footer')

</html>
