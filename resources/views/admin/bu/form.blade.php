

    <div class="text2{{ $errors->has('bu_name') ? ' has-error' : '' }}">
        <div class="col-md-10">
            {!! Form::text("bu_name" , null , ['class' =>'form-control']) !!}

            @if ($errors->has('bu_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('bu_name') }}</strong>
                </span>
            @endif
        </div>

        <label class="col-md-2">
      اسم العقار
        </label>

    </div>
    <div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('rooms') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("rooms" , roomnumber() , null , ['class' =>'form-control']) !!}

        @if ($errors->has('rooms'))
            <span class="help-block">
                <strong>{{ $errors->first('rooms') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
عدد الغرف
    </label>

</div>
<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('bu_price') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("bu_price" , null , ['class' =>'form-control']) !!}

        @if ($errors->has('bu_price'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_price') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
سعر العقار
    </label>

</div>
<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('bu_rent') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("bu_rent" , bu_rent(), null , ['class' =>'form-control']) !!}

        @if ($errors->has('bu_rent'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_rent') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
نوع العملية
    </label>

</div>
<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('bu_square') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("bu_square" , null , ['class' =>'form-control']) !!}

        @if ($errors->has('bu_square'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_square') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
مساحة العقار
    </label>

</div>
<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('bu_type') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("bu_type" , bu_type() , null , ['class' =>'form-control']) !!}

        @if ($errors->has('bu_type'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_type') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
نوع العقار
    </label>

</div>
<div class="clearfix"></div>
<br>


@if(!isset($user))
<div class="text2{{ $errors->has('bu_status') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("bu_status" , status() , null , ['class' =>'form-control']) !!}

        @if ($errors->has('bu_status'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_status') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
حالة العقار
    </label>

</div>
<div class="clearfix"></div>
<br>
@endif


<div class="text2{{ $errors->has('bu_place') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::select("bu_place" , bu_place() , null , ['class' =>'form-control select2']) !!}

        @if ($errors->has('bu_place'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_place') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
المنطقة
    </label>

</div>
<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('image') ? ' has-error' : '' }}">
    <div class="col-md-10">
        @if(isset($bu))
        @if($bu->image != '')
            <img src="{{ Request::root().'/website/bu_images/'.$bu->image }}" width="100" />
            <div class="clearfix"></div>
            <br>
        @endif
        @endif
        {!! Form::file("image" , null , ['class' =>'form-control']) !!}

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
صورة للعقار
    </label>

</div>
<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('bu_meta') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("bu_meta" , null , ['class' =>'form-control']) !!}

        @if ($errors->has('bu_meta'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_meta') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
الكلمات الدلاليه
    </label>

</div>
<div class="clearfix"></div>
<br>


@if(!isset($user))
<div class="text2{{ $errors->has('bu_small_dis') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::textarea("bu_small_dis" , null , ['class' =>'form-control' , 'rows' => '4']) !!}

        @if ($errors->has('bu_small_dis'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_small_dis') }}</strong>
            </span>
        @endif
        <br>
        <div class="alert alert-warning">
لا يمكن ادخال اكثر من 160 حرف على حسب معاير جوجل
        </div>
    </div>

    <label class="col-md-2">
وصف العقار لمحركات البحث
    </label>

</div>
<div class="clearfix"></div>
<br>
@endif


<div class="text2{{ $errors->has('bu_langtuide') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("bu_langtuide" , null , ['class' =>'form-control']) !!}

        @if ($errors->has('bu_langtuide'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_langtuide') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
خط الطول
    </label>

</div>
<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('bu_latitude') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::text("bu_latitude" , null , ['class' =>'form-control']) !!}

        @if ($errors->has('bu_latitude'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_latitude') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
دائرة العرض
    </label>

</div>
<div class="clearfix"></div>
<br>


<div class="text2{{ $errors->has('bu_large_dis') ? ' has-error' : '' }}">
    <div class="col-md-10">
        {!! Form::textarea("bu_large_dis" , null , ['class' =>'form-control']) !!}

        @if ($errors->has('bu_large_dis'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_large_dis') }}</strong>
            </span>
        @endif
    </div>

    <label class="col-md-2">
وصف مطول للعقار
    </label>

</div>
<div class="clearfix"></div>
<br>




    <div class="text2">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i>
                تنفيذ
            </button>
        </div>
    </div>
