<div class="col-md-3">
@if(Auth::user())
  <div class="profile-sidebar">
    <h2 style="margin-right: 10px;">
خيارات العضو
    </h2>
    <div class="profile-usermenu">
      <ul class="nav" style="margin-right: 0px; padding-right: 0px;">
        <li class="{{ setActive(['user' , 'editsetting']) }}">
          <a href="{{ url('/user/editsetting') }}">
          <i class="glyphicon glyphicon-home"></i>
          تعديل المعلومات الشخصية
         </a>
        </li>
        <li class="{{ setActive(['user' , 'bulldingShow']) }}">
          <a href="{{ url('/user/bulldingShow') }}">
          <i class="glyphicon glyphicon-user"></i>
          العقارات المفعلة
        <label class="label label-default"> {{ buforusercount(Auth::user()->id  , 1) }} </label>
         </a>
        </li>

        <li class="{{ setActive(['user' , 'bulldingShowwaiting']) }}">
          <a href="{{ url('/user/bulldingShowwaiting') }}">
          <i class="glyphicon glyphicon-user"></i>
           عقارات فى انتظار التفعيل
           <label class="label label-default"> {{ buforusercount(Auth::user()->id , 0) }} </label>
         </a>
        </li>

        <li class="{{ setActive(['user' , 'create' , 'bullding']) }}">
          <a href="{{ url('/user/create/bullding') }}">
          <i class="glyphicon glyphicon-user"></i>
          اضف عقار
         </a>
        </li>
      </ul>
    </div>
    </div>
    <br>
@endif

  <div class="profile-sidebar">
    <h2 style="margin-right: 10px;">
  خيارات العقارات
    </h2>
    <div class="profile-usermenu">
      <ul class="nav" style="margin-right: 0px; padding-right: 0px;">

        <li class="{{ setActive(['ShowAllBullding']) }}">

          <a href="{{ url('/ShowAllBullding') }}">
          <i class="glyphicon glyphicon-home"></i>
          كل العقارات </a>
        </li>
        <li class="{{ setActive(['ForRent']) }}">
          <a href="{{ url('/ForRent') }}">
          <i class="glyphicon glyphicon-user"></i>
          ايجار </a>
        </li>
        <li class="{{ setActive(['ForBuy']) }}">
          <a href="{{ url('/ForBuy') }}">
          <i class="glyphicon glyphicon-user"></i>
          تمليك </a>
        </li>

        <li class="{{ setActive(['type' , '0']) }}">
          <a href="{{ url('/type/0') }}">
          <i class="glyphicon glyphicon-user"></i>
          الشقق </a>
        </li>

        <li class="{{ setActive(['type' , '1']) }}">
          <a href="{{ url('/type/1') }}">
          <i class="glyphicon glyphicon-user"></i>
          الفيلا </a>
        </li>

        <li class="{{ setActive(['type' , '2']) }}">
          <a href="{{ url('/type/2') }}">
          <i class="glyphicon glyphicon-user"></i>
          شاليهات </a>
        </li>

      </ul>
    </div>
    <!-- END MENU -->
  </div>

<br>

  <div class="profile-sidebar">
    <h2 style="margin-right: 10px;">
  البحث المتقدم
    </h2>
    <div class="profile-usermenu" style="padding:10px">
        {!! Form::open(['url' => 'search' , 'method' => 'get']) !!}
      <ul class="nav" style="margin-right: 0px; padding-right: 0px;">

        <li class="itemsearch">
            {!! Form::text("bu_price_from" , null , ['class' => 'form-control' , 'placeholder' => 'سعر العقار من']) !!}
        </li>

        <li class="itemsearch">
            {!! Form::text("bu_price_to" , null , ['class' => 'form-control' , 'placeholder' => ' سعر العقار الى']) !!}
        </li>

        <li class="itemsearch">
            {!! Form::select("bu_place" , bu_place() , null , ['class' => 'form-control select2' , 'placeholder' => 'منطقة العقار']) !!}
        </li>

        <li class="itemsearch">
            {!! Form::select("rooms" , roomnumber() , null , ['class' => 'form-control' , 'placeholder' => 'عدد الغرف']) !!}
        </li>

        <li class="itemsearch">
            {!! Form::select("bu_type" , bu_type() , null , ['class' => 'form-control' , 'placeholder' => ' نوع العقار ']) !!}
        </li>

        <li class="itemsearch">
            {!! Form::select("bu_rent" , bu_rent() , null , ['class' => 'form-control' , 'placeholder' => ' نوع العملية ']) !!}
        </li>

        <li class="itemsearch">
            {!! Form::text("bu_square" , null , ['class' => 'form-control' , 'placeholder' => ' المساحة ']) !!}
        </li>

        <li>
            {!! Form::submit("ابحث" , ['class' => 'banner_btn']) !!}
        </li>


      </ul>
      {!! Form::close() !!}
    </div>
    <!-- END MENU -->
  </div>
   <br>


    </div>
