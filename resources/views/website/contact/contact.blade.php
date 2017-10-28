@extends('layouts.app')

@section('title')
  اتصل بنا
@endsection

@section('header')
  {!! Html::style('cus/buall.css') !!}

@endsection

@section('content')
<br>
<br>


<div class="container">
  <h1>
اتصل بنا
  </h1>
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                {!! Form::open(['url' => '/contact' , 'method' => 'post']) !!}

                {{ csrf_token() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                الاسم</label>
                            <input name="contact_name" type="text" class="form-control" id="name" placeholder="ادخل اسمك" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                البريد الالكترونى</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input name="contact_email" type="email" class="form-control" id="email" placeholder="ادخل البريد الالكترونى" value="{{ Auth::user() ? Auth::user()->email : '' }}" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                العنوان</label>
                            <select id="subject" name="contact_type" class="form-control" required="required">

                              @foreach(contact() as $key => $con)

                                  <option value="{{ $key }}">{{ $con }}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                الرسالة</label>
                            <textarea name="contact_message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="الرسالة"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="banner_btn pull-right" id="btnContactUs">
                            ارسل الرسالة</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><i class="fa fa-outdent"></i> مكتبنا</legend>
            <address>
                 {{ nl2br(getSetting('adress')[0]->value) }}
                 <br>
                <abbr title="Phone">
                    ت:</abbr>
                {{ nl2br(getSetting('mobile')[0]->value) }}
            </address>
            <br>
            <address>
                <strong>{{ getSetting('email')[0]->value }}</strong><br>
                <a href="mailto:#">{{ getSetting('email')[0]->value }}</a>
            </address>
            </form>
        </div>
    </div>
</div>

@endsection
