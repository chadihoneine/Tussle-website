
@extends('Layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

                <h2>Manage Tournament</h2>
            </div>
            <div class="pull-right">

                    <h2 class="">tournament: {{$tournament->title}}</h2>

            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



    <table class="table table-bordered table-responsive-lg">
        @if($ns==0)

            <tr>
                <th>Number</th>
                <th>ID</th>
                <th>Username</th>
                <th>Points</th>
                <th></th>
            </tr>
            <?php $i=0 ?>

                <br>
                @foreach ($members as $m)
                <form action="{{ route('setpoints') }}" method="POST">
                    @csrf
                    <input hidden name='accountID' value="{{$m->accountID}}">
                    <input hidden name='tournamentID'value="{{$tournament->tournamentID}}">
                    <input hidden name='issolo'value="true">
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{$m->accountID}}</td>
                        <td>{{$m->username}}</td>
                        <td>
                            <input type="number" name="points" placeholder="points">
                        </td>
                        <td>
                            <button class="btn btn-success"  type="Submit">Submit</button>
                        </td>
                    </tr>
                </form>
                @endforeach


        @else
            <tr>
                <th>Number</th>
                <th>ID</th>
                <th>Team</th>
                <th>Points</th>
            </tr>
            <?php $i=0 ?>

                <br>
                @foreach ($members as $m)
                <form action="{{ route('setpoints') }}" method="POST">
                    @csrf
                    <input hidden name='teamID' value="{{$m->teamID}}">
                    <input hidden name='tournamentID'value="{{$tournament->tournamentID}}">
                    <input hidden name='issolo'value="false">
                    <tr>
                        <td>{{ ++$i }}</td>
                       <td> <a href="/teamview/id={{$m->teamID}}">{{$m->teamID}}</a></td>
                        <td>{{$m->teamName}}</td>
                        <td>
                            <input name='points' type="number" placeholder="points">
                        </td>
                        <td>
                            <button class="btn btn-success"  type="Submit">Submit</button>
                        </td>
                    </tr>
                </form>
                @endforeach



        @endif

    </table>


@endsection
