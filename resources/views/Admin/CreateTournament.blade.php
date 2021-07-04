@extends('Layouts.app')

@section('content')

    <div>
        <form action="{{ route('createtournament') }}" method="POST">
            @csrf
          {{--  <input type="hidden" name="accountID" value="{{Auth::user()->accountID}}">
            <input type="hidden" name="isdeleted" value="null">--}}

            <label>Title</label>
            <input type="text" name="title" placeholder="" value="">
            <br>
            <label>Category</label>
            <input type="text" name="category" placeholder="" value="">
            <br>
            <label>Place</label>
            <input type="text" name="place" placeholder="" value="">
            <br>
            <label>Description</label>
            <input type="text" name="description" placeholder="" value="">
            <br>
            <label>Location</label>
            <input type="text" name="location" placeholder="" value="">
            <br>
            <label>TournamentsCol</label>
            <input type="text" name="tournamentscol" placeholder="" value="">
            <br>
            <label>Is Solo</label>
            <input type="text" name="issolo" placeholder="" value="">
            <br>
            <label>StartDate</label>
            <input type="datetime-local" name="time" placeholder="" value="">
            <br>
            <label>EndDate</label>
            <input type="datetime-local" name="duration" placeholder="" value="">
            <br>
            <button type="submit" title="submit" >Submit</button>

        </form>
    </div>
@endsection
