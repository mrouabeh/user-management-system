@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Create role
					</div>
					<div class="card-body">
						<form action="{{ route('admin.roles.store') }}" method="POST">
							@csrf
							<div class="form-group">
								<label for="name">Name</label>
								<input
									type="text"
									class="form-control @error('name') is-invalid @enderror"
									name="name"
									id="name"
									value="{{ old('name') }}">
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-check my-3">
								<input type="checkbox" class="form-check-input" name="is_active" id="is-active">
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
											value="{{ $permission->id }}">
										<label class="form-check-label" for="{{ $permission->slug }}">{{ $permission->name }}</label>
									</div>
								@endforeach
							</div>

							<button type="submit" class="btn btn-primary">Create role</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
