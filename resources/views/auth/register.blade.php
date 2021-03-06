@extends('layouts.pre-panel')

@section('content')
<div class="text-center">
    <a href="#" class="logo logo-lg"><i class="md md-laptop"></i> <span>OceanProject</span> </a>
</div>

<form class="form-horizontal m-t-20" action="{{ route('panel.user.register') }}" role="form" method="POST">
    {!! csrf_field() !!}

    <div class="form-group">
        <div class="col-xs-12">
            <input type="text" class="form-control{{ $errors->has('name') ? ' parsley-error' : '' }}" name="name" value="{{ old('name') }}" required="" placeholder="Name">
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
            <input type="email" class="form-control{{ $errors->has('email') ? ' parsley-error' : '' }}" name="email" value="{{ old('email') }}" required="" placeholder="Email">
            <i class="md md-email form-control-feedback l-h-34"></i>

            @if ($errors->has('email'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('email') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <input type="text" class="form-control{{ $errors->has('regname') ? ' parsley-error' : '' }}" name="regname" value="{{ old('regname') }}" required="" placeholder="xat Login">
            <i class="md md-account-circle form-control-feedback l-h-34"></i>

            @if ($errors->has('regname'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('regname') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <input type="number" class="form-control{{ $errors->has('xatid') ? ' parsley-error' : '' }}" name="xatid" value="{{ old('xatid') }}" required="" placeholder="xat ID">
            <i class="md md-chevron-right form-control-feedback l-h-34"></i>

            @if ($errors->has('xatid'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('xatid') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <input type="password" class="form-control{{ $errors->has('password') ? ' parsley-error' : '' }}" name="password" required="" placeholder="Password">
            <i class="md md-vpn-key form-control-feedback l-h-34"></i>

            @if ($errors->has('password'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('password') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' parsley-error' : '' }}" name="password_confirmation" required="" placeholder="Confirm Password">
            <i class="md md-vpn-key form-control-feedback l-h-34"></i>

            @if ($errors->has('password_confirmation'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('password_confirmation') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12">
            <div class="checkbox checkbox-primary">
                <input id="checkbox-signup" type="checkbox" checked="checked">
                <label for="checkbox-signup">
                    I accept <a href="//xat.com/terms.html">Terms and Conditions</a>
                </label>
            </div>

        </div>
    </div>

    <div class="form-group text-right m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary btn-custom waves-effect waves-light w-md" type="submit">Register</button>
        </div>
    </div>

    <div class="form-group m-t-30">
        <div class="col-sm-12 text-center">
            <a href="{{ route('panel.user.login') }}" class="text-muted">Already have account?</a>
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