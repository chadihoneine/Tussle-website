<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="{{ url('/css/Profile.css') }}"/>
@include('layouts.header')

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

        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Create a team</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <!--BOOKMARK-->
                    <!--search form1 to find the inputs related to this form-->
                    <form action="{{ route('team.store') }}" method="POST" id="frm">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">Event information</h6>
                        <div class="pl-lg-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Team Name</label>

                                        <!--form1-->
                                        <input type="text" id="input-username" name="teamName"
                                               class="form-control form-control-alternative" placeholder="Title"
                                               value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Category</label>

                                        <!--form1-->
                                        <select name="category" class="form-control form-control-alternative">
                                            <option value="football">FootBall</option>
                                            <option value="basketball">BasketBall</option>
                                            <option value="programming">Programming</option>
                                            <option value="gaming">Gaming</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Type</label>
                                        <small>(Competitive teams are teams that focus on winning tournaments)</small>

                                        <!--form1-->
                                        <select name="isCompetitive" class="form-control form-control-alternative">
                                            <option value="true">Competitive</option>
                                            <option value="false">Chill</option>
                                        </select>

                                    </div>
                                </div>

                            </div>

                            <div>
                                <label class="form-control-label" for="input-last-name">Description</label>
                            </div>
                            <textarea type="text" name="description" rows="4"
                                      class="form-control form-control-alternative"
                                      form="frm"
                                      placeholder="Write a small description about your team and state the regulations"></textarea>
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
