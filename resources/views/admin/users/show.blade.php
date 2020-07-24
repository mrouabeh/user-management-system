@extends('layouts.app')

@section('content')
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h1 class="text-center">{{ $user->name }}</h1>
			</div>
		</div>

		<div class="row justify-content-center my-5">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						Informations
					</div>
					<div class="card-body">
						<div class="card-text">
							<strong>Name:</strong> {{ $user->name }}
						</div>
						<div class="card-text">
							<strong>Email:</strong> {{ $user->email }}
						</div>
						<div class="card-text">
							<strong>Registered:</strong> {{ $user->created_at }}
						</div>
						<div class="card-text">
							<strong>Updated:</strong> {{ $user->updated_at }}
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						Roles
					</div>
					<div class="card-body">
						@if($user->roles()->exists())
							<ul>
								@foreach($user->roles()->get() as $role)
									<li>{{ $role->name }}</li>
								@endforeach
							</ul>
						@else
							No roles
						@endif
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						Permissions
					</div>
					<div class="card-body">
						@empty($user->getPermissions())
							No permissions
						@else
							<ul>
								@foreach($user->getPermissions() as $permission)
									<li>
										<strong>{{ $permission->name }}</strong> - {{ $permission->slug }}
									</li>
								@endforeach
							</ul>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
