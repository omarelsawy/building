@extends('admin.layouts.layout')

@section('title')

  اضف عضو

@endsection

@section('header')



@endsection


@section('content')

<section class="content-header">
          <h1>
            اضف عضو
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{ url('/adminpanel/users') }}">التحكم فى الاعضاء</a></li>
            <li class="active"><a href="{{ url('/adminpanel/users/create') }}"> اضافة عضو جديد </a></li>
          </ol>
        </section>


        <!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
              اضف عضو جديد
            </h3>
          </div><!-- /.box-header -->
        <div class="box-body">



    {!! Form::open(['url' => '/adminpanel/users' , 'method' => 'post']) !!}
           @include('admin.user.form')

           {!! Form::close() !!}


       </div>
    </div>
   </div>
  </div>
</section>

@endsection



@section('footer')



@endsection
