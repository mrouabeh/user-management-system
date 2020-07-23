@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<h1>Roles</h1>

		<div class="row justify-content-center">
			<div class="col-md-10">
				<a class="btn btn-primary" href="{{ route('admin.roles.create') }}">+ Create role</a>
			</div>
		</div>

		<div class="row justify-content-center">

		</div>
	</div>
@endsection
