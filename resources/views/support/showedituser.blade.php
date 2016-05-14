@extends('layouts.panel')

@section('content')
<div class="row">
	<div class="col-sm-offset-2 col-sm-8">
		<h4 class="page-title">User's Profile</h4>
	</div>
</div>

<div class="row">
	<div class="col-sm-offset-2 col-sm-8">
		<div class="card-box">
			<div class="row">
				<h4 class="m-t-0 header-title"><b>Edit User's Profile</b></h4>
				<p class="text-muted m-b-30 font-13">You can edit the user's information via this page</p>

				<form class="form-horizontal" role="form" action="{{ route('panel.support.edituser', $user->id) }}" method="POST">
					<input name="_method" type="hidden" value="PUT">
					{!! csrf_field() !!}

					<div class="form-group">
						<label for="regname" class="col-sm-2 control-label">xat Login</label>
						<div class="col-sm-9">
							<input type="text" class="form-control{{ $errors->has('regname') ? ' parsley-error' : '' }}" id="regname" name="regname" placeholder="{{ $user->regname }}">
							@if ($errors->has('regname'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('regname') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="xatid" class="col-sm-2 control-label">xatID</label>
						<div class="col-sm-9">
							<input type="number" class="form-control{{ $errors->has('xatid') ? ' parsley-error' : '' }}" id="xatid" name="xatid" placeholder="{{ $user->xatid }}">
							@if ($errors->has('xatid'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('xatid') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9">
							<input type="email" class="form-control{{ $errors->has('email') ? ' parsley-error' : '' }}" id="email" name="email" placeholder="{{ $user->email }}">
							@if ($errors->has('email'))
								<ul class="parsley-errors-list filled">
									<li class="parsley-required">{{ $errors->first('email') }}</li>
								</ul>
							@endif
						</div>
					</div>
					<div class="form-group m-b-0">
						<div class="col-sm-offset-2 col-sm-9">
							<button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection