@extends('admin.layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> External API </h1>

								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">API</li>
												<li class="breadcrumb-item active"><a href="#">Create External API</a></li>
								</ul>
				</div>
				<div class="row p-3 mx-auto">
								<div class="col-lg-8 col-xl-8 tile mx-auto">
												<div class="row m-4">
																<h6 class="display-4">Fill in the form to update</h6>
												</div>
												<div class="form-input">
																<form action="{{ route('admin.apis.store') }}" method="POST" id="create-api-form">
																				@csrf
																				@method('POST')
																				<div class="col m-2">
																								<label for="url-name" class="input-label">Name of url</label>
																								<input id="url-name" class="form-control  @error('name') is-invalid @enderror" type="text"
																												name="name" value="{{ old('name') }}">
																								@error('name')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>

																				<div class="col m-2">
																								<label for="url" class="input-label">Url</label>
																								<input id="url" class="form-control   @error('url') is-invalid @enderror" type="text"
																												name="url" value="{{ old('url') }}">
																								@error('url')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>

																				<div class="col m-2">
																								<label for="call_type" class="input-label">Call type of url</label>
																								<select id="call_type" name="call_type"
																												class="form-control @error('call_type') is-invalid @enderror">
																												<optgroup label="Select request type">
																																<option value="GET"> GET Request</option>
																																<option value="POST"> POST Request</option>
																												</optgroup>
																								</select>
																								@error('call_type')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>
																				<div class="col m-2">
																								<label for="description" class="input-label">Description of url</label>
																								<textarea name="description" id="description" cols="30" rows="10"
																								    class="form-control   @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
																								@error('description')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>
																				<div class="col m-2">
																								<label for="params" class="input-label">Parameters of url</label>
																								<input id="params" class="form-control   @error('params') is-invalid @enderror" type="text"
																												name="params" value="{{ old('params') }}">
																								@error('params')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>
																				<div class="col m-2">
																								<label for="source" class="input-label">Source of url</label>
																								<input id="source" class="form-control   @error('source') is-invalid @enderror" type="text"
																												name="source" value="{{ old('source') }}">
																								@error('source')
																												<span class="invalid-feedback" role="alert">
																																<strong>{{ $message }}</strong>
																												</span>
																								@enderror
																				</div>
																				<div class="row d-flex justify-content-center">
																								<div class="m-2">
																												<button class="btn btn-success" type="submit"> Submit</button>
																								</div>
																								<div class="m-2">
																												<a href="{{ route('admin.apis.index') }}" class="btn btn-danger"> Cancel</a>
																								</div>
																				</div>

																</form>
												</div>
								</div>
				</div>
@endsection
