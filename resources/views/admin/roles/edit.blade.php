@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Update role {{ $role->name }}
					</div>
					<div class="card-body">
						<form action="{{ route('admin.roles.update', $role) }}" method="POST">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label for="name">Name</label>
								<input
									type="text"
									class="form-control @error('name') is-invalid @enderror"
									name="name"
									id="name"
									value="{{ old('name') ?? $role->name }}">
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-check my-3">
								<input
									type="checkbox"
									class="form-check-input"
									name="is_active"
									id="is-active"
									@if($role->is_active) checked @endif>
								<label class="form-check-label" for="is-active">Is active ?</label>
							</div>

							<h3 class="my-3">Permissions</h3>

							<div class="my-3">
								@foreach($permissions as $permission)
									<div class="form-check">
										<input
											type="checkbox"
											class="form-check-input"
											name="permissions[]"
											id="{{ $permission->slug }}"
											value="{{ $permission->id }}"
											@if($role->hasPermission($permission->slug)) checked @endif>
										<label class="form-check-label" for="{{ $permission->slug }}">{{ $permission->name }}</label>
									</div>
								@endforeach
							</div>

							<button type="submit" class="btn btn-primary">Update role</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
