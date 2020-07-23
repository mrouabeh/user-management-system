@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-sm-8 col-md-6 text-center">
				<a class="btn btn-primary mx-2" href="{{ route('admin.users.index') }}">Users</a>
				<a class="btn btn-primary mx-2" href="{{ route('admin.roles.index') }}">Roles</a>
				<a class="btn btn-primary mx-2" href="{{ route('admin.permissions.index') }}">Permissions</a>
			</div>
		</div>
	</div>
@endsection
