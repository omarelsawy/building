@extends('admin.layouts.layout')

@section('title')

  اضف عقار

@endsection

@section('header')

{!! Html::style('cus/css/select2.css') !!}


@endsection


@section('content')

<section class="content-header">
          <h1>
            اضف عقار
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{ url('/adminpanel/bu') }}"> التحكم فى العقارات </a></li>
            <li class="active"><a href="{{ url('/adminpanel/bu/create') }}"> اضف عقار جديد </a></li>
          </ol>
        </section>


        <!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
   اضف عقار جديد
            </h3>
          </div><!-- /.box-header -->
        <div class="box-body">



    {!! Form::open(['url' => '/adminpanel/bu' , 'method' => 'post' , 'files' => true]) !!}
           @include('admin.bu.form')

           {!! Form::close() !!}


       </div>
    </div>
   </div>
  </div>
</section>

@endsection



@section('footer')

{!! Html::script('cus/js/select2.js') !!}
<script type="text/javascript">
  $('.select2').select2({
    dir: "rtl"
  });
</script>

@endsection
