<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {!! Html::style('website/css/bootstrap.min.css') !!}
  {!! Html::style('website/css/flexslider.css') !!}
  {!! Html::style('website/css/style.css') !!}
  {!! Html::style('website/css/font-awesome.min.css') !!}
  {!! Html::script('website/js/jquery.min.js')!!}

  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

    <title>

      {{ getSetting()[0]->value }}

        |

        @yield('title')

    </title>

{!! Html::style('cus/css/select2.css') !!}
{!! Html::style('cus/font.css') !!}

        @yield('header')

</head>
<body id="app-layout" style="direction:rtl">


  <div class="header">
    <div class="container"> <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-paper-plane"></i> ONE</a>
      <div class="menu pull-left"> <a class="toggleMenu" href="#"><img src="{{ Request::root() }}/website/images/nav_icon.png" alt="" /> </a>
        <ul class="nav" id="nav">

          @if (!Auth::guest())
          @if (Auth::user()->admin == 1 )
              <li><a href="{{ url('/adminpanel') }}"> لوحة التحكم بالموقع </a></li>
          @endif
          @endif
          <li class="{{ setActive(['home'] , 'current') }}"><a href="{{ url('/home') }}"> الرئيسية </a></li>
          <li class="{{ setActive(['ShowAllBullding'] , 'current') }}"><a href="{{ url('/ShowAllBullding') }}"> كل العقارات </a></li>

          <li class="dropdown {{ setActive(['search'] , 'current') }}">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  ايجار <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                @foreach(bu_type() as $keyType => $type)
                  <li style="width: 100%"><a href="{{ url('/search?bu_rent=1&bu_type='.$keyType) }}"> {{ $type }} </a></li>
                  @endforeach
              </ul>
          </li>


          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  تمليك <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                @foreach(bu_type() as $keyType => $type)
                  <li style="width: 100%"><a href="{{ url('/search?bu_rent=0&bu_type='.$keyType) }}"> {{ $type }} </a></li>
                  @endforeach
              </ul>
          </li>

          <li><a href="{{ url('/contact') }}"> اتصل بنا </a></li>
          @if (Auth::guest())
              <li><a href="{{ url('/login') }}"> تسجيل الدخول </a></li>
              <li><a href="{{ url('/register') }}"> عضوية جديدة </a></li>
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">

                    <li>
                      <a href="{{ url('/user/editsetting') }}">
                      <i class="glyphicon glyphicon-home"></i>
                      تعديل المعلومات الشخصية
                     </a>
                    </li>
                    <li>
                      <a href="{{ url('/user/bulldingShow') }}">
                      <i class="glyphicon glyphicon-user"></i>
                      العقارات المفعلة
                     </a>
                    </li>

                    <li>
                      <a href="{{ url('/user/bulldingShowwaiting') }}">
                      <i class="glyphicon glyphicon-user"></i>
                       عقارات فى انتظار التفعيل
                     </a>
                    </li>

                    <li>
                      <a href="{{ url('/user/create/bullding') }}">
                      <i class="glyphicon glyphicon-user"></i>
                      اضف عقار
                     </a>
                    </li>

                      <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> تسجيل الخروج </a></li>

                  </ul>
              </li>
          @endif
          <div class="clear"></div>
        </ul>

      </div>
    </div>
  </div>



@include('layouts.message')

    @yield('content')

    <div class="footer">
      <div class="footer_bottom">
        <div class="follow-us">
          <a class="fa fa-facebook social-icon" href="{{ getSetting('facebook') }}"></a>
          <a class="fa fa-twitter social-icon" href="{{ getSetting('twitter') }}"></a>
          <a class="fa fa-youtube social-icon" href="{{ getSetting('youtube') }}"></a> </div>
        <div class="copy">
          <p> {{ getSetting('footer') }} &copy; {{ date('Y') }} <a href="http://facebook.com/" rel="nofollow">Omar Elsawy</a></p>
        </div>
      </div>
    </div>


 {!! Html::script('website/js/responsive-nav.js')!!}
 {!! Html::script('website/js/bootstrap.min.js')!!}
 {!! Html::script('website/js/jquery.flexslider.js')!!}
 {!! Html::script('cus/js/select2.js') !!}
 <script type="text/javascript">
   $('.select2').select2({
     dir: "rtl"
   });
 </script>


    @yield('footer')

</body>
</html>
