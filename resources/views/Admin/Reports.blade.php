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
                    <th >reportID</th>
                    <th >reporterID</th>
                    <th >reportedID</th>
                    <th >date</th>
                    <th >reason</th>
                    <th >message</th>


                    <th width="280px">Action</th>
                </tr>
                @foreach ($reports as $acc)
                    <tr>
                        <td >{{ ++$i }}</td>
                        <td >{{ $acc->reportID }}</td>
                        <td ><a href="{{route('profileview', $acc->reporterID)}}"> {{ $acc->reporterID }}</a></td>
                        <td ><a href="{{route('profileview', $acc->reportedID)}}"> {{ $acc->reportedID }}</a></td>
                        <td >{{ $acc->date }}</td>
                        <td >{{ $acc->reason }}</td>
                        <td >{{ $acc->message }}</td>
                        <td >
{{--                            <form action="{{ route('events.destroy',$acc) }}" method="POST">--}}
{{--                                <a href="{{ route('events.show', $acc->accountID) }}" title="show">--}}
{{--                                    <i class="fas fa-eye text-success  fa-lg"></i>--}}
{{--                                </a>--}}
{{--                                <a href="{{ route('events.edit', $acc->accountID) }}">--}}
{{--                                    <i class="fas fa-edit  fa-lg"></i>--}}
{{--                                </a>--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button type="submit" title="delete" style="border: none; background-color:transparent;">--}}
{{--                                    <i class="fas fa-trash fa-lg text-danger"></i>--}}

{{--                                </button>--}}
{{--                            </form>--}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
@endsection
