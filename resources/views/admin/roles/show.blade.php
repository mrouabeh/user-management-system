@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h1>{{ $role->name }}</h1>
			</div>
		</div>

		<div class="row justify-content-center my-5">
			<div class="col-md-8">
				<form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
					@csrf
					@method('DELETE')
					<a class="btn btn-primary" href="{{ route('admin.roles.edit', $role) }}">Edit</a>
					<button class="btn btn-danger" type="submit">Delete</button>
				</form>
			</div>
		</div>

		<div class="row justify-content-center my-5">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Permissions
					</div>
					<div class="card-body">
						@if($role->permissions()->exists())
							<ul>
								@foreach($role->permissions()->get() as $permission)
									<li><strong>{{ $permission->name }}</strong> - {{ $permission->slug }}</li>
								@endforeach
							</ul>
						@else
							No permissions
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
