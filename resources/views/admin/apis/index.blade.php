@extends('admin.layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> External APIs </h1>

								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">APIs</li>
												<li class="breadcrumb-item active"><a href="#">External APIs</a></li>
								</ul>
				</div>
				<div class="row p-3 mx-aut">
								<div class="col-lg-4  col-xl-4 mt-2">
												<div class="tile">
																<div class="tile-body">
																				<div class="card-body">
																								<div class="row">
																												<h4>APIS</h4>
																												<h5 class="display-5  mt-1 ml-2 text-info">{{ count($apis) }} Posts</h5>
																								</div>
																								<hr>
																				</div>
																</div>

												</div>
								</div>
								<div class="col-lg-8 col-xl-8">
												@forelse ($apis as $api)
																<div class="tile post-div mt-2">
																				<div class="card">
																								<div class="card-header">
																												<div class="row">
																																<div class="m-2 row">
																																				<a href="{{ route('admin.apis.edit', ['api' => $api->id]) }}"
																																								class="btn btn-secondary">Edit</a>
																																</div>
																																<div class="m-2 row">
																																				<a href="{{ route('admin.apis.show', ['api' => $api->id]) }}"
																																								class="btn btn-info">Show</a>
																																</div>
																																<div class="m-2 row">
																																				@if (!$api->is_suspended)
																																								<a onclick="event.preventDefault(); document.getElementById('suspend-form{{ $api->id }}').submit();"
																																												class="btn btn-danger">Suspend</a>
																																								<div class="d-none">
																																												<form
																																																action="{{ route('admin.apiadmincommands', ['apiadmincommand' => $api->id]) }}"
																																																method="POST" id="suspend-form{{ $api->id }}">
																																																@csrf
																																																@method('PUT')
																																																<input type="text" name="is_suspended" value="1">
																																												</form>
																																								</div>
																																				@else
																																								<a onclick="event.preventDefault(); document.getElementById('suspend-form{{ $api->id }}').submit();"
																																												class="btn btn-info">Unsuspend</a>
																																								<div class="d-none">
																																												<form
																																																action="{{ route('admin.apiadmincommands', ['apiadmincommand' => $api->id]) }}"
																																																method="POST" id="suspend-form{{ $api->id }}">
																																																@csrf
																																																@method('PUT')
																																																<input type="text" name="is_suspended" value="0">
																																												</form>
																																								</div>
																																				@endif
																																</div>
																																<div class="m-2 row">
																																				@if (!$api->status)
																																								<a onclick="event.preventDefault(); document.getElementById('status-form{{ $api->id }}').submit();"
																																												class="btn btn-primary">Activate</a>
																																								<div class="d-none">
																																												<form
																																																action="{{ route('admin.apiadmincommands', ['apiadmincommand' => $api->id]) }}"
																																																method="POST" id="status-form{{ $api->id }}">
																																																@csrf
																																																@method('PUT')
																																																<input type="text" name="status" value="1">
																																												</form>
																																								</div>
																																				@else
																																								<a onclick="event.preventDefault(); document.getElementById('status-form{{ $api->id }}').submit();"
																																												class="btn btn-danger">Deactivate</a>
																																								<div class="d-none">
																																												<form
																																																action="{{ route('admin.apiadmincommands', ['apiadmincommand' => $api->id]) }}"
																																																method="POST" id="status-form{{ $api->id }}">
																																																@csrf
																																																@method('PUT')
																																																<input type="text" name="status" value="0">
																																												</form>
																																								</div>
																																				@endif
																																</div>
																																<div class="m-2 row">
																																				@if (!$api->is_callable)
																																								<a onclick="event.preventDefault(); document.getElementById('is_callable-form{{ $api->id }}').submit();"
																																												class="btn btn-success">Set Callable</a>
																																								<div class="d-none">
																																												<form
																																																action="{{ route('admin.apiadmincommands', ['apiadmincommand' => $api->id]) }}"
																																																method="POST" id="is_callable-form{{ $api->id }}">
																																																@csrf
																																																@method('PUT')
																																																<input type="text" name="is_callable" value="1">
																																																{{--  <input type="text" name="is_callable_by" value="{{ auth()->id() }}">  --}}

																																												</form>
																																								</div>
																																				@else
																																								<a onclick="event.preventDefault(); document.getElementById('is_callable-form{{ $api->id }}').submit();"
																																												class="btn btn-danger">Set UnCallable</a>
																																								<div class="d-none">
																																												<form
																																																action="{{ route('admin.apiadmincommands', ['apiadmincommand' => $api->id]) }}"
																																																method="POST" id="is_callable-form{{ $api->id }}">
																																																@csrf
																																																@method('PUT')
																																																<input type="text" name="is_callable" value="0">
																																												</form>
																																								</div>
																																				@endif
																																</div>
																																<hr>
																																<br>
																												</div>
																								</div>
																								<div class="card-body">
																												<h5 class="display-5">{{ $api->name }}</h5>
																												<p>{{ $api->url }}</p>
																								</div>
																				</div>
																</div>
												@empty
																<div class="tile post-div mt-2">
																				<h3> There are no apis</h3>
																</div>
												@endforelse
								</div>

				</div>
@endsection
