@extends('layouts.app')

@section('title')
  الرئيسيه
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                
                @if (Auth::user()->admin == 1 )
                    <li><a href="{{ url('/adminpanel') }}"> لوحة التحكم بالموقع </a></li>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
