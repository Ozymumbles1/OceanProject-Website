@extends('layouts.pre-panel')

@section('content')
<div class="text-center">
    <a href="#" class="logo logo-lg"><i class="md md-laptop"></i> <span>OceanProject</span> </a>
</div>

<form class="text-center m-t-20" role="form" method="POST" action="{{ route('panel.user.password.email') }}">
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Enter your <b>Email</b> and instructions will be sent to you!
    </div>
    {!! csrf_field() !!}

    <div class="form-group m-b-0">
        <div class="input-group">
            <input type="email" class="form-control{{ $errors->has('email') ? ' parsley-error' : '' }}" name="email" value="{{ old('email') }}" required="" placeholder="Enter Email">
            <i class="md md-email form-control-feedback l-h-34" style="left:6px;"></i>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-email btn-primary waves-effect waves-light">Reset</button>
            </span>
        </div>
    </div>
</form>
@endsection

@section('footer')
@if (session('status') or (count($errors) > 0))
    <script src="/build/plugins/notifyjs/dist/notify.min.js"></script>
    <script src="/build/plugins/notifications/notify-metro.js"></script>
    <script type="text/javascript">
        @if (session('status'))
            $.Notification.autoHideNotify('success', 'top right', 'Success', '{{ session('status') }}');
        @endif
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                $.Notification.autoHideNotify('error', 'top right', 'An error occurred', '{{ $error }}');
            @endforeach
        @endif
    </script>
@endif
@endsection
