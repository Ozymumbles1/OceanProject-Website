@extends('layouts.pre-panel')

@section('content')
<div class="text-center">
    <a href="#" class="logo logo-lg"><i class="md md-laptop"></i> <span>OceanProject</span> </a>
</div>

<form class="form-horizontal m-t-20" role="form" method="POST" action="{{ route('panel.user.password.reset') }}">
    {!! csrf_field() !!}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
        <div class="col-xs-12">
            <input type="email" class="form-control{{ $errors->has('email') ? ' parsley-error' : '' }}" name="email" value="{{ $email or old('email') }}" required="" placeholder="Email">
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
            <input type="password" class="form-control{{ $errors->has('password') ? ' parsley-error' : '' }}" name="password" required="" placeholder="New Password">
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
            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' parsley-error' : '' }}" name="password_confirmation" required="" placeholder="Confirm New Password">
            <i class="md md-vpn-key form-control-feedback l-h-34"></i>

            @if ($errors->has('password_confirmation'))
                <ul class="parsley-errors-list filled">
                    <li class="parsley-required">{{ $errors->first('password_confirmation') }}</li>
                </ul>
            @endif
        </div>
    </div>

    <div class="form-group text-right m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary btn-custom waves-effect waves-light w-md" type="submit"><i class="fa fa-btn fa-refresh"></i> Reset Password</button>
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