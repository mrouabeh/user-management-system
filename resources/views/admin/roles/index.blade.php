@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h1>Roles</h1>
			</div>
		</div>

		<div class="row justify-content-center my-4">
			<div class="col-md-10">
				<a class="btn btn-primary" href="{{ route('admin.roles.create') }}">+ Create role</a>
			</div>
		</div>

		<div class="row justify-content-center my-4">
			<div class="col-md-10">
				<table class="table table-striped table-bordered">
					<thead class="thead-dark">
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Status</th>
						<th scope="col">Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach($roles as $role)
						<tr>
							<td>
								<a href="{{ route('admin.roles.show', $role) }}">
									<strong>{{ $role->name }}</strong>
								</a>
							</td>
							<td>
									<span class="badge {{ $role->is_active ? "badge-success" : "badge-secondary" }}">
										{{ $role->is_active ? "active" : "no active" }}
									</span>
							</td>
							<td style="width: 25%">
								<form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
									@csrf
									@method('DELETE')
									<a class="btn btn-primary" href="{{ route('admin.roles.edit', $role) }}">Edit</a>
									<button class="btn btn-danger" type="submit">Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				{{ $roles->links() }}
			</div>
		</div>
	</div>
@endsection
