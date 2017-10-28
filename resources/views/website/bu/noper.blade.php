@extends('layouts.app')

@section('title')
{{ $messageTitle }}
@endsection

@section('header')
  {!! Html::style('cus/buall.css') !!}

@endsection

@section('content')

<div class="container">
    <div class="row profile">
    <div class="col-md-9">

      <ol class="breadcrumb">
  <li><a href="{{ url('/') }}">الرئيسية</a></li>
  <li><a href="{{ url('/ShowAllBullding') }}"> كل العقارات </a></li>
  <li><a href="{{ url('/SingleBullding/'.$buInfo->id) }}"> {{ $buInfo->bu_name }} </a></li>
</ol>
                <div class="profile-content">
    	           <div class="alert alert-danger">
                   <b>
        تنبية
                   </b>
        {{ $messageBody }}
                 </div>
                </div>
                </div>

     @include('website.bu.pages')

    	</div>
    </div>

    <br>
    <br>

@endsection
