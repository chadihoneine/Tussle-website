@extends('Layouts.app')

@section('content')

    <div>
        <form action="{{ route('createQuestions') }}" method="POST">
        @csrf
            <input type="hidden" name="surveyID" value="{{$id}}">
            <br>
            <label for="input-username">Question1</label>
            <input type="text" id="input-username" name="question" placeholder="Question1" value="">
            <br>
            <label for="input-username">Choices1</label>
            <input type="text" id="input-username" name="choices" placeholder="Choices1" value="">
            <br>
            <button type="submit" title="submit">
                submit
            </button>
        </form>
    </div>
@endsection
