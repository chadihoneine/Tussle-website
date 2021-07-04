@extends('Layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

                <h2>events table</h2>
            </div>
{{--            <div class="pull-right">--}}
{{--                                <a class="btn btn-success" href="{{ route('events.create') }}" title="Create an event">--}}
{{--                <i class="fas fa-plus-circle"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <div style="overflow-x:auto;">
        <table class="table table-bordered table-responsive-lg">
            <tr>
                <th >number</th>
                <th >eventID</th>
                <th >creator</th>
                <th >time</th>
                <th >place</th>
                <th >duration</th>
                <th >description</th>
                <th >location</th>
                <th >title</th>


                <th width="280px">Action</th>
            </tr>
            @foreach ($events as $acc)
                <tr>
                    <td >{{ ++$i }}</td>
                    <td ><a href="{{route('eventview', $acc->eventID)}}">{{ $acc->eventID }}</a></td>
                    <td ><a href="{{route('profileview', $acc->accountID)}}"> {{ $acc->accountID }}</a></td>
                    <td >{{ $acc->time }}</td>
                    <td >{{ $acc->place }}</td>
                    <td >{{ $acc->duration }}</td>
                    <td style="max-width: 20px;">{{ $acc->description }}</td>
                    <td >{{ $acc->location }}</td>
                    <td >{{ $acc->title }}</td>
                    <td >
                        <form action="{{ route('events.destroy',$acc) }}" method="POST">
                            <a href="{{ route('events.show', $acc->accountID) }}" title="show">
                                <i class="fas fa-eye text-success  fa-lg"></i>
                            </a>
                            <a href="{{ route('events.edit', $acc->accountID) }}">
                                <i class="fas fa-edit  fa-lg"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>

                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
