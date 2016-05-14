@extends('layouts.panel')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<h4 class="m-t-0 header-title"><b>List of Users</b></h4>
			<p class="text-muted font-13 m-b-25">Easier to search information about a user.</p>

			<table class="table table table-hover table-responsive m-0">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Regname</th>
						<th>xatID</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->regname }}</td>
							<td>{{ $user->xatid }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-sm btn-info dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">More <span class="caret"></span></button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="{{ route('panel.support.edituser', $user->id) }}">Edit Information</a></li>
										@role('admin')<li><a href="{{ route('panel.admin.edituserrole', $user->id) }}">Edit Role</a></li>@endrole
									</ul>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{!! $users->render() !!}
		</div>
	</div>
</div>
@endsection