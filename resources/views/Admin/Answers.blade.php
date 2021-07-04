@extends('Layouts.app')
@section('content')

    {{--    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>--}}
    {{--    <linkr el="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/algoliasearch.helper/2/algoliasearch.helper.min.js"></script>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Answers</h2>
            </div>
        </div>
    </div>
    {{--    <div class="container">--}}
    <table class="myTable" id="myTable">
        <thead>
        <tr>
            <th class="text-center">questionID</th>
            <th class="text-center">question</th>
            <th class="text-center">choices</th>
            <th class="text-center">user id</th>
            <th class="text-center">users answer</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($QA as $acc)
            <tr>
                <td>{{ $acc->questionID }}</td>
                <td>{{ $acc->question }}</td>
                <td>{{ $acc->choices }}</td>
                <td>{{ $acc->accountID }}</td>
                <td>{{ $acc->answerValue }}</td>


            </tr>
        @endforeach
        </tbody>
    </table>


    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

    {{--    </div>--}}
@endsection

