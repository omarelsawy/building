<li class="treeview">
  <a href="#">
    <i class="fa fa-dashboard pull-right"></i>

    <span style="margin-right:25px;">اعدادات الموقع</span>

    <i class="fa fa-angle-right pull-left"></i>
    <div class="clearfix"></div>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{ url('/adminpanel/sitesetting') }}"><i class="fa fa-circle-o"></i> اعدادات رئيسية </a></li>
    <li><a href="index2.html"><i class="fa fa-circle-o"></i> اعدادات اخرى</a></li>
  </ul>
</li>

{{-- users --}}

<li class="treeview">
  <a href="#">
    <i class="fa fa-users pull-right"></i>

    <span style="margin-right:25px;">التحكم فى الاعضاء</span>

    <i class="fa fa-angle-right pull-left"></i>
    <div class="clearfix"></div>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{ url('/adminpanel/users/create') }}"><i class="fa fa-circle-o"></i> اضف عضو </a></li>
    <li><a href="{{ url('/adminpanel/users') }}"><i class="fa fa-circle-o"></i> كل الاعضاء </a></li>
  </ul>
</li>



{{-- Bu --}}

<li class="treeview">
  <a href="#">
    <i class="fa fa-users pull-right"></i>

    <span style="margin-right:25px;"> التحكم فى العقارات </span>

    <i class="fa fa-angle-right pull-left"></i>
    <div class="clearfix"></div>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="{{ url('/adminpanel/bu/create') }}"><i class="fa fa-circle-o"></i> اضف عقار </a></li>
    <li><a href="{{ url('/adminpanel/bu') }}"><i class="fa fa-circle-o"></i> كل العقارات </a></li>
  </ul>
</li>



{{-- contact --}}

<li class="treeview">
  <a href="#">
    <i class="fa fa-users pull-right"></i>

    <span style="margin-right:25px;">   رسائل الموقع </span>

    <i class="fa fa-angle-right pull-left"></i>
    <div class="clearfix"></div>
  </a>
  <ul class="treeview-menu">
    <li><a href="{{ url('/adminpanel/contact') }}"><i class="fa fa-circle-o"></i>  الرسائل </a></li>
  </ul>
</li>
