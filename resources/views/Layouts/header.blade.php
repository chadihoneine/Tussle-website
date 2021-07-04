<style>
    .notification {
        color: white;
        text-decoration: none;
        padding: 15px 26px;
        position: relative;
        display: inline-block;
    }


    .notification .badge {
        position: absolute;
        top: -10px;
        right: -10px;
        padding: 1px 5px;
        border-radius: 50%;
        background: red;
        color: white;
        /*width: 30px;*/
        /*height: 30px;*/
    }

    .icon {
        width: 30px;
        height: 30px;
        position: relative;
    }

    .txt {
        background-color: red;
        font-size: xx-small;
        position: absolute;
        padding: 2px;
        top: 5px;
        left: 5px;
        border-radius: 25px;
    }

    a.notif {
        position: relative;
        display: block;
        height: 50px;
        width: 50px;
        background: url('http://i.imgur.com/evpC48G.png');
        background-size: contain;
        text-decoration: none;
    }

    .num {
        position: absolute;
        right: 11px;
        top: 6px;
        color: #040505;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
$x = \App\Http\Controllers\AccountController::ncount();
?>
<div class="header">

    <a href="/" class="logo '.$activeindex.'">Tussle</a>
    <div class="header-right">
        @auth()
            <a href="{{route('notifications')}}" class="notification">
                <span> <i class="fa fa-bell"></i></span>
                <span class="">{{$x}}</span>
            </a>



            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @if(Auth::user()->type==0)
                <a href="/admin">Admin Panel</a>
            @endif
            <a class="" href="{{ route('events') }}">Events</a>
            <a class="" href="{{ route('leaderboardview') }}">LeaderBoard</a>
            <a class="" href="{{route('tournament_list')}}">Tournaments</a>
            <a class="" href="{{route('team_list')}}">Teams</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Logout</a>
            <a href="{{ route('profile') }}">Profile</a>

        @else
            <a class="" href="{{ route('login') }}">Login</a>
            <a class="" href="{{ route('account.create') }}">Register</a>
        @endauth

        <a class="" href="/AboutUs">About us</a>
    </div>
</div>


