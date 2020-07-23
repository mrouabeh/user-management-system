@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Update permission
					</div>
					<div class="card-body">
						<form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
							@csrf
							@method('PUT')
							<div class="form-group">
								<label for="name">Name</label>
								<input
									type="text"
									class="form-control @error('name') is-invalid @enderror"
									name="name"
									id="name"
									value="{{ old('name') ?? $permission->name }}">
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="slug">Slug</label>
								<input
									type="text"
									class="form-control @error('slug') is-invalid @enderror"
									name="slug"
									id="slug"
									value="{{ old('slug') ?? $permission->slug }}">
								@error('slug')
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
									@if($permission->is_active) checked @endif>
								<label class="form-check-label" for="is-active">Is active ?</label>
							</div>

							<button type="submit" class="btn btn-primary">Update permission</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

