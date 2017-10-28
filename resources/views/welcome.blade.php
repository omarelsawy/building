@extends('layouts.app')

@section('title')
  اهلا بك زائرنا الكريم
@endsection

@section('header')

<style>
    .banner{
      background: url({{ checkIfImageIsexist(getSetting('main_slider') , '/public/website/slider/' , '/website/slider/') }}) no-repeat center;
      min-height: 500px;
      width: 100%;
      -webkit-background-size: 100%;
      -moz-background-size: 100%;
      -o-background-size: 100%;
      background-size: 100%;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      padding-bottom: 100px;
    }
</style>

<link rel="stylesheet" href="{{ Request::root() }}/main/css/reset.css"> <!-- Resource style -->
<link rel="stylesheet" href="{{ Request::root() }}/main/css/style.css"> <!-- Resource style -->
<script src="{{ Request::root() }}/main/js/modernizr.js"></script> <!-- Modernizr -->


@endsection

@section('content')

<div class="banner text-center">
  <div class="container">
    <div class="banner-info">
      <h1>
اهلا بك فى
{{ getSetting()[0]->value }}

      </h1>
      <p>


            {!! Form::open(['url' => 'search' , 'method' => 'get']) !!}
            <div class="row">
              <div class="col-lg-3">
                   {!! Form::text("bu_price_from" , null , ['class' => 'form-control' , 'placeholder' => 'سعر العقار من']) !!}
              </div>
              <div class="col-lg-3">
                   {!! Form::text("bu_price_to" , null , ['class' => 'form-control' , 'placeholder' => ' سعر العقار الى']) !!}
              </div>
              <div class="col-lg-3">
                   {!! Form::select("rooms" , roomnumber() , null , ['class' => 'form-control select2' , 'placeholder' => 'عدد الغرف']) !!}
              </div>
              <div class="col-lg-3">
                   {!! Form::select("bu_type" , bu_type() , null , ['class' => 'form-control' , 'placeholder' => ' نوع العقار ']) !!}
              </div>
            </div>
  <br>
             <div class="row">
                <div class="col-lg-3">
                    {!! Form::submit("ابحث" , ['class' => 'btn' , 'style' => 'width:100%']) !!}
                </div>
                <div class="col-lg-3">
                    {!! Form::select("bu_place" , bu_place() , null , ['class' => 'form-control select2' , 'placeholder' => 'منطقة العقار']) !!}
                </div>
                <div class="col-lg-3">
                    {!! Form::select("bu_rent" , bu_rent() , null , ['class' => 'form-control' , 'placeholder' => ' نوع العملية ']) !!}
                </div>
                <div class="col-lg-3">
                    {!! Form::text("bu_square" , null , ['class' => 'form-control' , 'placeholder' => ' المساحة ']) !!}
                </div>
            </div>



          {!! Form::close() !!}


      </p>
      <a class="banner_btn" href="{{ url('/user/create/bullding') }}">   اضف عقارك مجانا </a> </div>
  </div>
</div>
<div class="main">


<ul class="cd-items cd-container">

    @foreach(\App\Bu::where('bu_status' , 1)->get() as $bu)
		<li class="cd-item effect8">
			<img src="{{ checkIfImageIsexist($bu->image) }}" alt="{{ $bu->name }}" title="{{ $bu->name }}">
			<a href="#0" data-id="{{ $bu->id }}" class="cd-trigger" title="{{ $bu->name }}">نبذة سريعة</a>
		</li> <!-- cd-item -->
    @endforeach

	</ul> <!-- cd-items -->

	<div class="cd-quick-view">
		<div class="cd-slider-wrapper">
			<ul class="cd-slider">
				<li><img src="" class="imagebox" alt="Product 1"></li>
			</ul> <!-- cd-slider -->
		</div> <!-- cd-slider-wrapper -->

		<div class="cd-item-info">
			<h2 class="titlebox"></h2>
			<p class="disbox"></p>

			<ul class="cd-item-action">
				<li><a href="" class="add-to-cart pricebox"></a></li>
				<li><a href="" class="morbox">اقرا المزيد</a></li>
			</ul> <!-- cd-item-action -->
		</div> <!-- cd-item-info -->
		<a href="#0" class="cd-close">Close</a>
	</div> <!-- cd-quick-view -->


</div>

@endsection


@section('footer')

<script src="{{ Request::root() }}/main/js/jquery-2.1.1.js"></script>
<script src="{{ Request::root() }}/main/js/velocity.min.js"></script>
<script>
    function urlHome(){
      return '{{ Request::root() }}';
    }
    function noImageUrl(){
      return '{{ getSetting('no_image') }}';
    }
</script>

<script src="{{ Request::root() }}/main/js/main.js"></script> <!-- Resource jQuery -->

@endsection
