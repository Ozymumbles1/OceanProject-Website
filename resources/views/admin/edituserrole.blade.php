@extends('layouts.panel')

@section('content')
<div class="row">
	<div class="col-sm-offset-2 col-sm-8">
		<div class="card-box">
			<h4 class="m-t-0 header-title"><b>Change User's Role</b></h4>
			<p class="text-muted font-13 m-b-25">You can change user's roles.</p>

			<div class="col-md-4 col-sm-8" style="float: none;margin: 0 auto;">
				<form role="form" action="{{ route('panel.admin.edituserrole', $user->id) }}" method="POST">
					<input name="_method" type="hidden" value="PUT">
					{!! csrf_field() !!}
					{!! Form::select('roles[]', $roles, $userRoles->toArray(), ['multiple' => 'multiple', 'id' => 'role_user', 'data-plugin' => 'multiselect', 'class' => 'multi-select', 'style' => 'text-align:center;']) !!}
					<div class="form-group m-t-10 m-l-15">
						<div class="col-sm-10" style="float: none;margin: 0 auto;">
							<button type="submit" class="btn btn-block btn-primary waves-effect waves-light">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
	$('[data-plugin="multiselect"]').multiSelect($(this).data());
</script>
@endsection