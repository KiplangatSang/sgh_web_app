@extends('layouts.app')

@section('content')
				<div class="row p-3 mx-aut">
								<div class="col-lg-4  col-xl-4 mt-2">
												<div class="tile">
																<div class="tile-title">
																				<h5 class="display-5">Account</h5>
																</div>
																<div class="tile-body">
																				<div class="tile col">
																								<img src="img_avatar.png" alt="Avatar">
																								<h5 class="display-5 mt-2">{{ auth()->user()->name ?? 'Guest' }}</h5>
																				</div>
																</div>
																<div class="tile-body">
																				<div class="tile ">
																								<div class="row">
																												<h4>My Posts</h4>
																												<h5 class="display-5  mt-1 ml-2 text-info">{{ count($data['posts']) }} Posts</h5>
																								</div>
																								<hr>
																								<a href="/user/post/create" class="btn btn-primary">Create Post</a>
																				</div>
																</div>

												</div>
								</div>

								<div class="col-lg-8 col-xl-8">
												@foreach ($data['posts'] as $post)
																<div class="tile post-div mt-2">
																				<a href="/user/post/show/{{ $post->post_id }}" class="btn btn-secondary">View</a>

																				<hr>
																				<br>

																				<h5 class="display-5">{{ $post->post_title }}</h5>


																				<p>{!! $post->post_body !!}</p>



																</div>
												@endforeach

								</div>

				</div>
@endsection
