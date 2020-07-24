@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Update user
					</div>
					<div class="card-body">
						<form action="{{ route('admin.users.update', $user) }}" method="POST">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label for="name">Name</label>
								<input
									type="text"
									class="form-control @error('name') is-invalid @enderror"
									name="name"
									id="name"
									value="{{ old('name') ?? $user->name }}">
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input
									type="email"
									class="form-control @error('email') is-invalid @enderror"
									name="email"
									id="email"
									value="{{ old('email') ?? $user->email }}">
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input
									type="password"
									class="form-control @error('password') is-invalid @enderror"
									name="password"
									id="password"
									value="{{ old('password') }}">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="password-confirm">Confirm password</label>
								<input
									type="password"
									class="form-control"
									name="password_confirmation"
									id="password-confirm">
							</div>


							<h3 class="my-3">Roles</h3>

							<div class="my-3">
								@foreach($roles as $role)
									<div class="form-check">
										<input
											type="checkbox"
											class="form-check-input"
											name="roles[]"
											id="{{ $role->name }}"
											value="{{ $role->id }}"
											@if($user->hasRole($role->name)) checked @endif>
										<label class="form-check-label" for="{{ $role->name }}">{{ $role->name }}</label>
									</div>
								@endforeach
							</div>

							<button type="submit" class="btn btn-primary">Update user</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

