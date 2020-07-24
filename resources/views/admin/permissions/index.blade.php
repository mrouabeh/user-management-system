@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h1>Permissions</h1>
			</div>
		</div>

		<div class="row justify-content-center my-4">
			<div class="col-md-10">
				<a class="btn btn-primary" href="{{ route('admin.permissions.create') }}">+ Create permission</a>
			</div>
		</div>

		<div class="row justify-content-center my-4">
			<div class="col-md-10">
				<table class="table table-striped table-bordered">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Name</th>
							<th scope="col">Slug</th>
							<th scope="col">Status</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($permissions as $permission)
							<tr>
								<td><strong>{{ $permission->name }}</strong></td>
								<td>{{ $permission->slug }}</td>
								<td>
									<span class="badge {{ $permission->is_active ? "badge-success" : "badge-secondary" }}">
										{{ $permission->is_active ? "active" : "no active" }}
									</span>
								</td>
								<td style="width: 25%">
									<form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST">
										@csrf
										@method('DELETE')
										<a class="btn btn-primary" href="{{ route('admin.permissions.edit', $permission) }}">Edit</a>
										<button class="btn btn-danger" type="submit">Delete</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{ $permissions->links() }}
			</div>
		</div>
	</div>
@endsection
