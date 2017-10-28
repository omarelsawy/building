@extends('admin.layouts.layout')

@section('title')

تعديل العضو
{{ $user->name }}

@endsection

@section('header')



@endsection


@section('content')

<section class="content-header">
          <h1>
            تعديل العضو
            {{ $user->name }}

          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ url('/adminpanel') }}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{ url('/adminpanel/users') }}">التحكم فى الاعضاء</a></li>
            <li class="active"><a href="{{ url('/adminpanel/users/'.$user->id.'edit') }}">
              تعديل العضو
              {{ $user->name }}

            </a></li>
          </ol>
        </section>


        <!-- Main content -->



<div class="row">
  <div class="col-log-3">

    <section class="content">
       <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">
                  تعديل العضو
                  {{ $user->name }}
                </h3>
              </div><!-- /.box-header -->
            <div class="box-body">


       {!! Form::model($user , ['route' =>['adminpanel.users.update' , $user->id] , 'method' => 'PATCH']) !!}
               @include('admin.user.form')
       {!! Form::close() !!}



           </div>
        </div>
       </div>
      </div>
    </section>


    <!-- Main content -->
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">
        تغير كلمة المرور الخاصه بالعضو
          {{ $user->name }}
        </h3>
      </div><!-- /.box-header -->
    <div class="box-body">


      {!! Form::open(['url' => '/adminpanel/user/changePassword' , 'method' => 'post']) !!}

       <input type="hidden" value="{{ $user->id }}" name="user_id">

      <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">

        <div class="col-md-2">
            <button type="submit" class="btn btn-warning">
                <i class="fa fa-btn fa-user"></i>
                تغير كلمة المرور
            </button>

          @if($user->id != 1)
              <a href="{{ url('/adminpanel/users/' . $user->id . '/delete') }}" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i> حذف العضو </a>
          @endif

        </div>


          <div class="col-md-10">
              <input type="password" class="form-control" name="password" placeholder="كلمة المرور">

              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>


      </div>


      {!! Form::close() !!}



    </div>
    </div>
    </div>
    </div>
    </section>

  </div>

<section class="content">
  <div class="col-md-9">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li><a href="#activity" data-toggle="tab"> عقارات غير مفعلة </a></li>
                    <li class="active"><a href="#timeline" data-toggle="tab"> عقارات مفعلة </a></li>

                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane" id="activity">
                      <table class="table table-bordered">
                        <tr>
                           <td> اسم العقار </td>
                           <td> اضيف فى </td>
                           <td> تغير حالة العقار </td>
                        </tr>
                      @foreach($buwaiting as $waiting)

                      <tr><td><a href="{{ url('/adminpanel/bu/'.$waiting->id.'/edit') }}">{{ $waiting->bu_name }}</a></td><td> {{ $waiting->created_at }}</td>
                        <td> <a href="{{ url('/adminpanel/change_status/'.$waiting->id.'/1') }}"> تفعيل العقار </a> </td>
                      </tr>

                      @endforeach
                      </table>
                      <div class="text-center">
                           {{ $buwaiting->appends(Request::except('page'))->render() }}
                      </div>

                    </div><!-- /.tab-pane -->



                    <div class="tab-pane active" id="timeline">
                        <table class="table table-bordered">
                          <tr>
                             <td> اسم العقار </td>
                             <td> اضيف فى </td>
                          </tr>
                          @foreach($buenable as $waiting)

                             <tr><td><a href="{{ url('/adminpanel/bu/'.$waiting->id.'/edit') }}">{{ $waiting->bu_name }}</a></td><td> {{ $waiting->created_at }}</td>
                                 <td> <a href="{{ url('/adminpanel/change_status/'.$waiting->id.'/0') }}"> الغاء التفعيل </a> </td>
                             </tr>

                          @endforeach
                        </table>

                        <div class="text-center">
                             {{ $buenable->appends(Request::except('page'))->render() }}
                        </div>

                    </div><!-- /.tab-pane -->


                  </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
              </div>

</div>
</section>






@endsection



@section('footer')



@endsection
