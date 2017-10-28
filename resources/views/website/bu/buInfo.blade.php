@extends('layouts.app')

@section('title')
العقار
{{ $buInfo->bu_name }}
@endsection

@section('header')

<script
src="http://maps.googleapis.com/maps/api/js">
</script>

  {!! Html::style('cus/buall.css') !!}
     <style>
         hr{
           margin-top: 10px;
           margin-bottom: 10px;
         }
         .dis{
           padding-bottom: 10px;
           margin-bottom: 10px;
         }
          .itemsearch{
            margin-bottom: 12px;
          }
          .breadcrumb{
            background-color: #ffffff;
          }
     </style>
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

                    <h1>
                         {{ $buInfo->bu_name }}
                    <h1>
                    <hr>

<div class="pull-right">
                    <div class="btn-group" role="group">

                    <a href="{{ url('/search?bu_price='.$buInfo->bu_price) }}" class="btn btn-default">
                         السعر
                         :
                         {{ $buInfo->bu_price }}
                    </a>

                    <a href="{{ url('/search?bu_square='.$buInfo->bu_square) }}" class="btn btn-default">
                         المساحة
                         :
                         {{ $buInfo->bu_square }}
                    </a>

                    <a href="{{ url('/search?bu_place='.$buInfo->bu_place) }}" class="btn btn-default">
                         المنطقة
                         :
                         {{ bu_place()[$buInfo->bu_place] }}
                    </a>

                    <a href="{{ url('/search?rooms='.$buInfo->rooms) }}" class="btn btn-default">
                         عدد الغرف
                         :
                         {{ $buInfo->rooms }}
                    </a>

                    <a href="{{ url('/search?bu_rent='.$buInfo->bu_rent) }}" class="btn btn-default">
                         نوع العملية
                         :
                         {{ bu_rent()[$buInfo->bu_rent] }}
                    </a>

                    <a href="{{ url('/search?bu_type='.$buInfo->bu_type) }}" class="btn btn-default">
                         نوع العقار
                         :
                         {{ bu_type()[$buInfo->bu_type] }}
                    </a>

</div>

                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-578a4f134496dedf"></script>
</div>

                  <div class="pull-left">
                    <!-- Go to www.addthis.com/dashboard to generate a new set of sharing buttons -->
                    <a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url={{ url('/SingleBullding/'.$buInfo->id) }}&pubid=ra-578a4f134496dedf&ct=1&title={{ $buInfo->bu_name }}|{{ getSetting() }}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/google_plusone_share.png" border="0" alt="Google+"/></a>
                    <a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url={{ url('/SingleBullding/'.$buInfo->id) }}&pubid=ra-578a4f134496dedf&ct=1&title={{ $buInfo->bu_name }}|{{ getSetting() }}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>
                    <a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={{ url('/SingleBullding/'.$buInfo->id) }}&pubid=ra-578a4f134496dedf&ct=1&title={{ $buInfo->bu_name }}|{{ getSetting() }}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v3/thumbs/32x32/twitter.png" border="0" alt="Twitter"/></a>
                  </div>

<div class="clearfix"></div>


<hr>
                    <img src="{{ checkIfImageIsexist($buInfo->image) }}" class="img-responsive" />
                      
                    <hr>
                    <p>
                         {!! nl2br($buInfo->bu_large_dis) !!}
                    </p>

<br>



               <div id="googleMap" style="width:100%;height:380px;"></div>


                </div>
                <br>
                <div class="profile-content">
                  <h3>
        عقارات اخرى قد تهمك
                     <hr>
                  </h3>
                    @include('website.bu.sharefile' , ['bu' => $same_rent])
                    @include('website.bu.sharefile' , ['bu' => $same_type])
                </div>
    		</div>

    @include('website.bu.pages')

    	</div>
    </div>

    <br>
    <br>

@endsection

@section('footer')

<script>
var myCenter=new google.maps.LatLng({{ $buInfo->bu_langtuide }},{{ $buInfo->bu_latitude }});
var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

@endsection
