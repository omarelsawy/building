


    <div class="text2{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">الاسم</label>

        <div class="col-md-6">
            {!! Form::text("name" , null , ['class' =>'form-control']) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="clearfix"></div>
<br>

@if(!isset($showforuser))
<div class="text2{{ $errors->has('admin') ? ' has-error' : '' }}">
    <label class="col-md-4 control-label">صلاحيات</label>

    <div class="col-md-6">
        {!! Form::select("admin" , ['0' => 'user' , '1' => 'admin'] , null , ['class' =>'form-control']) !!}

        @if ($errors->has('admin'))
            <span class="help-block">
                <strong>{{ $errors->first('admin') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="clearfix"></div>
<br>
@endif

    <div class="text2{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">البريد الالكترونى</label>

        <div class="col-md-6">
           {!! Form::text("email" , null , ['class' =>'form-control']) !!}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="clearfix"></div>
    <br>

    @if(!isset($user))
    <div class="text2{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">كلمة المرور</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="text2{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">تاكيد كلمة المرور </label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="clearfix"></div>
    <br>
    @endif


    <div class="text2">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i>
                تنفيذ
            </button>
        </div>
    </div>
