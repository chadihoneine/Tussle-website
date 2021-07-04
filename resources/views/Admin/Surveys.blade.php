@extends('Layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

                <h2>Account table</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin_create_surveys') }}" title="Create a survey">
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
            <th>start date</th>
            <th>end date</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($surveys as $acc)
            <tr>
                <td>{{ ++$i }}</td>
                <td><a href="{{route('surveyview', $acc->surveyID)}}">{{ $acc->surveyID }}</a></td>
                <td>{{ $acc->startdate }}</td>
                <td>{{ $acc->endDate }}</td>

                <td>
                    <a href="{{ route('addQuestionsPage', ['id' => $acc->surveyID]) }}">add questions</a>
                    <a href="{{ route('answers', ['id' => $acc->surveyID]) }}">answers</a>

                    {{--                    <form action="{{ route('account.destroy',$acc) }}" method="POST">--}}

{{--                        --}}{{--   <a href="{{ route('account.show', $acc->accountID) }}" title="show">--}}
{{--                               <i class="fas fa-eye text-success  fa-lg"></i>--}}
{{--                           </a>--}}

{{--                        <a href="{{ route('account.edit', $acc->accountID) }}">--}}
{{--                            <i class="fas fa-edit  fa-lg"></i>--}}
{{--                        </a>--}}

{{--                        @csrf--}}
{{--                        @method('DELETE')--}}

{{--                        <button type="submit" title="delete" style="border: none; background-color:transparent;">--}}
{{--                            <i class="fas fa-trash fa-lg text-danger"></i>--}}

{{--                        </button>--}}
{{--                    </form>--}}


                </td>
            </tr>
        @endforeach
    </table>

@endsection
