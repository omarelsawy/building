@extends('layouts.app')

@section('title')
تم اضافة العقار بنجاح
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
  <li><a href="{{ url('/user/create/bullding') }}">اضافة عقار جديد</a></li>
  <li class="active"><a href="#">تم اضافة العقار بنجاح</a></li>


</ol>
                <div class="profile-content">
                  <div class="alert alert-success">
                         <b>
 تم اضافة
                         </b>
 العقار بنجاح
                  </div>
                </div>
    		</div>

     @include('website.bu.pages')

    	</div>
    </div>

    <br>
    <br>

@endsection
