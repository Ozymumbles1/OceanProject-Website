@extends('layouts.pre-panel')

@section('content')
<div class="text-center">
    <a href="#" class="logo logo-lg"><i class="md md-laptop"></i> <span>OceanProject</span> </a>
</div>

<form class="form-horizontal m-t-20" role="form" method="POST" action="{{ route('panel.user.login') }}">
    {!! csrf_field() !!}

    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control{{ $errors->has('name') ? ' parsley-error' : '' }}" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required="">
            <i class="md md-account-circle form-control-feedback l-h-34"></i>

            @if ($errors->has('name'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('name') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <input class="form-control{{ $errors->has('name') ? ' parsley-error' : '' }}" type="password" name="password" placeholder="Password" required="">
            <i class="md md-vpn-key form-control-feedback l-h-34"></i>

            @if ($errors->has('name'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('name') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <div class="checkbox checkbox-primary">
                <input id="checkbox-signup" type="checkbox" name="remember">
                <label for="checkbox-signup">Remember me</label>
            </div>
        </div>
    </div>

    <div class="form-group text-right m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary btn-custom w-md waves-effect waves-light" type="submit">Log In</button>
        </div>
    </div>

    <div class="form-group m-t-30">
        <div class="col-sm-7">
            <a href="{{ route('panel.user.password.reset') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
        </div>
        <div class="col-sm-5 text-right">
            <a href="{{ route('panel.user.register') }}" class="text-muted">Create an account</a>
        </div>
    </div>
</form>
@endsection

@section('footer')
@if (count($errors) > 0)
    <script src="/build/plugins/notifyjs/dist/notify.min.js"></script>
    <script src="/build/plugins/notifications/notify-metro.js"></script>
    <script type="text/javascript">
    @foreach ($errors->all() as $error)
        $.Notification.autoHideNotify('error', 'top right', 'An error occurred', '{{ $error }}');
    @endforeach
    </script>
@endif
@endsection