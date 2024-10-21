
@extends('user_template.layouts.template')
@section('main-content')
<h1>Userprofile name: {{ Auth::user()->name }}</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              <ul>
                <li><a href="{{ route('userprofile') }}">Dashboard</a></li>
                <li><a href="{{ route('Userprofilependingorder') }}">Pending Order</a></li>
                <li><a href="{{ route('history') }}">History</a></li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
              </ul>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                @yield('profilecontent')
            </div>
                
        </div>
    </div>
</div>
@endsection

