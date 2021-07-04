@extends('Layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

                <h2>Account table</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('account.create') }}" title="Create an account">
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
    <div style="overflow-x:auto;">

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>number</th>
            <th>type</th>
            <th>email</th>
            <th>country</th>
            <th>creation date</th>
            <th>birth of date</th>
            <th>gender</th>
            <th>ban</th>
            <th>username</th>
            <th>first name</th>
            <th>last name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($account as $acc)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $acc->type }}</td>
                <td>{{ $acc->email }}</td>
                <td>{{ $acc->country }}</td>
                <td>{{ $acc->crationDate }}</td>
                <td>{{ $acc->bOD }}</td>
                <td>{{ $acc->gender }}</td>
                <td>{{ $acc->ban }}</td>
                <td>{{ $acc->username }}</td>
                <td>{{ $acc->f_name }}</td>
                <td>{{ $acc->l_name }}</td>
{{--                <td>{{ date_format($acc->creationDate, 'jS M Y') }}</td>--}}
                <td>
                    <form action="{{ route('account.destroy',$acc) }}" method="POST">

                     {{--   <a href="{{ route('account.show', $acc->accountID) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>--}}

                        <a href="{{ route('account.edit', $acc->accountID) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>

                   {{-- <a href="{{ route('destroyprofile', $acc->accountID) }}" title="delete">
                        <i class="fas fa-trash fa-lg text-danger"></i>{{$acc->accountID}}
                    </a>
                    <a href="{{ route('account.show', $acc->accountID) }}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i>
                    </a>
                    <a href="{{ route('account.edit', $acc->accountID) }}">
                        <i class="fas fa-edit  fa-lg"></i>
                    </a>--}}

                </td>
            </tr>
        @endforeach
    </table>
    </div>
{{--    {!! $account->links() !!}--}}

@endsection
