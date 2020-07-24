@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<h1>Users</h1>
			</div>
		</div>

		<div class="row justify-content-center my-5">
			<div class="col-md-10">
				<a class="btn btn-primary" href="{{ route('admin.users.create') }}">+ Create users</a>
			</div>
		</div>

		<div class="row justify-content-center my-5">
			<div class="col-md-10">
				<table class="table table-striped table-bordered">
					<thead class="thead-dark">
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Status</th>
						<th scope="col">Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach($users as $user)
						<tr>
							<td>
								<a href="{{ route('admin.users.show', $user) }}">
									<strong>{{ $user->name }}</strong>
								</a>
							</td>
							<td>{{ $user->email }}</td>
							<td>
								<span class="badge {{ $user->email_verified_at ? "badge-success" : "badge-secondary" }}">
									{{ $user->email_verified_at ? "verified" : "unverified" }}
								</span>
							</td>
							<td style="width: 25%">
								<form action="{{ route('admin.users.destroy', $user) }}" method="POST">
									@csrf
									@method('DELETE')
									<a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">Edit</a>
									<button class="btn btn-danger" type="submit">Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				{{ $users->links() }}
			</div>
		</div>
	</div>
@endsection
