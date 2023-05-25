@extends('admin.layouts.app')
@section('content')
				<div class="app-title">
								<div>
												<h1><i class="fa fa-th-list"></i> Articles </h1>

								</div>
								<ul class="app-breadcrumb breadcrumb side">
												<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
												<li class="breadcrumb-item">Arcticles</li>
												<li class="breadcrumb-item active"><a href="#">Articles</a></li>
								</ul>
				</div>
				<div class="row p-3 mx-aut">
								<div class="col-lg-4  col-xl-4 mt-2">
												<div class="tile">
																<div class="tile-body">
																				<div class="card-body">
																								<div class="row">
																												<h4>Posts</h4>

																												<h5 class="display-5  mt-1 ml-2 text-info">{{ count($postdata['posts']) }} Posts</h5>
																								</div>
																								<hr>
																				</div>
																</div>

												</div>
								</div>

								<div class="col-lg-8 col-xl-8">
												@if (count($postdata['posts']) < 1)
																<div class="tile post-div mt-2">
																				<h3> There are no Posts</h3>
																</div>
												@else
																@foreach ($postdata['posts'] as $post)
																				<div class="tile post-div mt-2">
																								<a href="{{ route('viewpost',['post_id' => $post->post_id]) }}" class="btn btn-secondary">View in web</a>
																								<a href="{{ route('admin.articles.show', ['article' => $post->id]) }}" class="btn btn-info">Show</a>

																								@if (!$post->is_suspended)
																												<a onclick="event.preventDefault(); document.getElementById('suspend-form{{ $post->id }}').submit();"
																																class="btn btn-danger">Suspend</a>
																												<div class="d-none">
																																<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}" method="POST"
																																				id="suspend-form{{ $post->id }}">
																																				@csrf
																																				@method('PUT')
																																				<input type="text" name="is_suspended" value="1">
																																</form>
																												</div>
																								@else
																												<a onclick="event.preventDefault(); document.getElementById('suspend-form{{ $post->id }}').submit();"
																																class="btn btn-info">Unsuspend</a>
																												<div class="d-none">
																																<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}" method="POST"
																																				id="suspend-form{{ $post->id }}">
																																				@csrf
																																				@method('PUT')
																																				<input type="text" name="is_suspended" value="0">
																																</form>
																												</div>
																								@endif
																								@if (!$post->status)
																												<a onclick="event.preventDefault(); document.getElementById('status-form{{ $post->id }}').submit();"
																																class="btn btn-primary">Activate</a>
																												<div class="d-none">
																																<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}"
																																				method="POST" id="status-form{{ $post->id }}">
																																				@csrf
																																				@method('PUT')
																																				<input type="text" name="status" value="1">
																																</form>
																												</div>
																								@else
																												<a onclick="event.preventDefault(); document.getElementById('status-form{{ $post->id }}').submit();"
																																class="btn btn-danger">Deactivate</a>
																												<div class="d-none">
																																<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}"
																																				method="POST" id="status-form{{ $post->id }}">
																																				@csrf
																																				@method('PUT')
																																				<input type="text" name="status" value="0">
																																</form>
																												</div>
																								@endif
																								@if (!$post->post_publish_status)
																												<a onclick="event.preventDefault(); document.getElementById('publish-form{{ $post->id }}').submit();"
																																class="btn btn-success">Publish</a>
																												<div class="d-none">
																																<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}"
																																				method="POST" id="publish-form{{ $post->id }}">
																																				@csrf
																																				@method('PUT')
																																				<input type="text" name="post_publish_status" value="1">
																																				<input type="text" name="post_publish_status_by" value="{{ auth()->id() }}">

																																</form>
																												</div>
																								@else
																												<a onclick="event.preventDefault(); document.getElementById('publish-form{{ $post->id }}').submit();"
																																class="btn btn-danger">DePublish</a>
																												<div class="d-none">
																																<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}"
																																				method="POST" id="publish-form{{ $post->id }}">
																																				@csrf
																																				@method('PUT')
																																				<input type="text" name="post_publish_status" value="0">
																																</form>
																												</div>
																								@endif


																								<hr>
																								<br>
																								<h5 class="display-5">{{ $post->post_title }}</h5>
																								<p>{!! $post->post_body !!}</p>

																				</div>
																@endforeach
												@endif


								</div>

				</div>
@endsection
