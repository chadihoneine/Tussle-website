@extends('Layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

                <h2>Tournaments</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin_create_tournaments') }}" title="Create a survey">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>number</th>
            <th>id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Place</th>
            <th>Is Solo</th>
            <th>Time</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tournaments as $acc)
            <tr>
                <td>{{ ++$i }}</td>
                <td><a href="{{route('tournamentview', $acc->tournamentID)}}">{{ $acc->tournamentID }}</a></td>
                <td>{{ $acc->title }}</td>
                <td>{{ $acc->category }}</td>
                <td>{{ $acc->place }}</td>
                <td>{{ $acc->issolo }}</td>
                <td>{{ $acc->time }} &#x2192; {{ $acc->duration }}</td>

                <td>
                    <form action="{{ route('tournament.destroy', $acc->tournamentID) }}" method="POST">
                        <a href="{{route('managetournament', $acc->tournamentID)}}">Manage</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete tournament</button>
                    </form>


                </td>
            </tr>
        @endforeach
    </table>

@endsection
