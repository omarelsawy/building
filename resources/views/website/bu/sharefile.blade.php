@if(count($bu) > 0)
 @foreach($bu as $key => $b)
 @if($key % 3 == 0 && $key != 0)
    <div class="clearfix"></div>
 @endif
    <div class="col-md-4 pull-right">
     <div class="productbox">
      <img src="{{ checkIfImageIsexist($b->image) }}" class="img-responsive">
      <div class="producttitle">{{ $b->bu_name }}</div>
      <p class="text-justify dis">{{ str_limit($b->bu_small_dis , 70)}}</p>
      <div class="productprice">

           <span class="pull-right">
المساحة:
            {{ $b->bu_square }}
           </span>

           <span class="pull-left">
نوع العملية:
            {{ bu_rent()[$b->bu_rent] }}
           </span>

           <span class="pull-right">
          نوع العقار :
            {{ bu_type()[$b->bu_type] }}
           </span>

           <span class="pull-left">
          المكان :
            {{ bu_place()[$b->bu_place] }}
           </span>

          <div class="clearfix"></div>

      <hr>
      <div class="pull-left">
        @if($b->bu_status == 0)
        <span class="btn btn-danger btm-sm" role="button"> فى انتظار التفعيل <span class="fa fa-arrow-circle-o-right" style="color:#FFFFFF"></span></span></div>
        <a href="{{ url('/user/edit/bullding/'.$b->id) }}" class="btn btn-success btm-sm"> تعديل العقار </a>
        @else
        <a href="{{ url('/SingleBullding/'.$b->id) }}" class="btn btn-primary btm-sm" role="button">اظهر التفاصيل <span class="fa fa-arrow-circle-o-right" style="color:#FFFFFF"></span></a></div>
        @endif
        <div class="pricetext">{{ $b->bu_price }}</div></div>
     </div>
    </div>
@endforeach

<div class="clearfix"></div>
<br>
@else
   <div class="alert alert-danger">
لا يوجد اى عقارات حاليا
   </div>

@endif
