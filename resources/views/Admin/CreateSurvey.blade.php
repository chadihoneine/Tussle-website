@extends('Layouts.app')

@section('content')

    <div>
        <form action="{{ route('createsurvey') }}" method="POST">
            @csrf
            <label>StartDate</label>
            <input type="datetime-local" name="startdate" placeholder="Time" value="">
            <br>
            <label>EndDate</label>
            <input type="datetime-local" name="endDate" placeholder="Time" value="">
            <br>
            <button type="submit" title="submit">
                submit
            </button>
        </form>
    </div>
@endsection
