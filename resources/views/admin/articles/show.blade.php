@extends('admin.layouts.app')
@section('content')
				<div class="row p-3 mx-auto">
								<div class="col-lg-8 col-xl-8">
												<div class="tile post-div mt-2">
																<a href="/{{ $post->post_id }}" class="btn btn-secondary">View in web</a>

																@if (!$post->is_suspended)
																				<a onclick="event.preventDefault(); document.getElementById('suspend-form').submit();"
																								class="btn btn-danger">Suspend</a>
																				<div class="d-none">
																								<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}" method="POST"
																												id="suspend-form">
																												@csrf
																												@method('PUT')
																												<input type="text" name="is_suspended" value="1">
																								</form>
																				</div>
																@else
																				<a onclick="event.preventDefault(); document.getElementById('suspend-form').submit();"
																								class="btn btn-info">Unsuspend</a>
																				<div class="d-none">
																								<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}" method="POST"
																												id="suspend-form">
																												@csrf
																												@method('PUT')
																												<input type="text" name="is_suspended" value="0">
																								</form>
																				</div>
																@endif
																@if (!$post->status)
																				<a onclick="event.preventDefault(); document.getElementById('status-form').submit();"
																								class="btn btn-primary">Activate</a>
																				<div class="d-none">
																								<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}" method="POST"
																												id="status-form">
																												@csrf
																												@method('PUT')
																												<input type="text" name="status" value="1">
																								</form>
																				</div>
																@else
																				<a onclick="event.preventDefault(); document.getElementById('status-form').submit();"
																								class="btn btn-danger">Deactivate</a>
																				<div class="d-none">
																								<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}" method="POST"
																												id="status-form">
																												@csrf
																												@method('PUT')
																												<input type="text" name="status" value="0">
																								</form>
																				</div>
																@endif
																@if (!$post->post_publish_status)
																				<a onclick="event.preventDefault(); document.getElementById('publish-form').submit();"
																								class="btn btn-success">Publish</a>
																				<div class="d-none">
																								<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}" method="POST"
																												id="publish-form">
																												@csrf
																												@method('PUT')
																												<input type="text" name="post_publish_status" value="1">
																												<input type="text" name="post_publish_status_by" value="{{ auth()->id() }}">

																								</form>
																				</div>
																@else
																				<a onclick="event.preventDefault(); document.getElementById('publish-form').submit();"
																								class="btn btn-danger">DePublish</a>
																				<div class="d-none">
																								<form action="{{ route('admin.articles.update', ['article' => $post->id]) }}" method="POST"
																												id="publish-form">
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
								</div>

				</div>
@endsection
