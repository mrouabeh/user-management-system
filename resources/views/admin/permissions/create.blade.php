@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Create permission
					</div>
					<div class="card-body">
						<form action="{{ route('admin.permissions.store') }}" method="POST">
							@csrf
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="slug">Slug</label>
								<input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}">
								@error('slug')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

							<div class="form-check my-3">
								<input type="checkbox" class="form-check-input" name="is_active" id="is-active">
								<label class="form-check-label" for="is-active">Is active ?</label>
							</div>

							<button type="submit" class="btn btn-primary">Create permission</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
