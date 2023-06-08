@extends('layouts.app')
@section('content')
				@php
								$post = $postsdata['post'];
				@endphp
				<div class="container bg-white ">
								<div class="tile row">
												<div class="tile-title m-2">
																<a href="/home" class="btn btn-primary">Home</a>
												</div>
												<div class="tile-title m-2">
																<a href="/users/posts/post/{{ $postsdata['post']->post_id }}" class="btn btn-secondary">View in Web</a>

												</div>
												<div class="tile-title m-2">
																<a href="{{ route('author.posts.edit', ['post' => $postsdata['post']->id]) }}" class="btn btn-info">Edit</a>

												</div>
												<div class="tile-title m-2">
																<form action="{{ route('author.posts.destroy', ['post' => $postsdata['post']->id]) }}" method="POST"
																				enctype="multipart/form-data" id="postForm">
																				@method('DELETE')
																				@csrf
																				<a type="submit" class="btn btn-danger"
																								onclick="notifyDeleteform(@json($postsdata['post']->id))">Delete</a>
																</form>
												</div>
								</div>

				</div>
				<div class="container bg-white p-5 ">
								<div class="d-flex justify-content-center">
												<h5 class="display-4">{{ $postsdata['post']->post_title }}</h5>

								</div>
								<div class="post-body mt-3">
												<p>{!! $postsdata['post']->post_body !!}</p>
								</div>

								<div id="comment-cont" onmouseover="showDiv()" class=" comment-cont">
												<div class="row m-2 p-2">
																@if ($postsdata['comments'])
																				<h6 class="col col-md-4 ml-4">{{ count($postsdata['comments']) }} Comments </h6>
																@endif
																<div class="col col-md-3 align-center ml-4">
																				<div class="row">
																								<div class=" feature-icon ml-4">
																												<img src="{{ asset('client/reactions/like.svg') }}" alt="Like">
																								</div>
																								@if ($postsdata['likes'])
																												<h3 class="ml-3"> {{ count($postsdata['likes']) }}</h3>
																								@endif
																				</div>


																</div>
																<div class="col col-md-3 align-left ml-4">
																				<div class="row">
																								<div class=" feature-icon">
																												<img src="{{ asset('client/reactions/heart.svg') }}" alt="Love">
																								</div>
																								@if ($postsdata['likes'])
																												<h3 class="ml-3"> {{ count($postsdata['likes']) }}</h3>
																								@endif
																				</div>

																</div>

												</div>
												<div id="hidden-div" class="hidden-div p-3">
																@if ($postsdata['comments'])
																				@if (count($postsdata['comments']) > 1)
																								@foreach ($postsdata['comments'] as $commentdata)
																												<div class="col">
																																@foreach ($commentdata->comment as $comment)
																																				<p class="mt-1 ml-2">
																																								<strong>{{ $comment->username }}</strong>{{ $comment->message }}
																																				</p>
																																@endforeach

																												</div>
																								@endforeach
																								<a class="m-1" href="/post/comment/view/{{ $postsdata['post']->id }}">View</a>
																				@endif
																@endif

												</div>
								</div>
				</div>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/sweetalert.min.js') }}"></script>

				<script type="text/javascript">
								function notifyDeleteform(id) {
												swal({
																title: "Delete Post",
																text: "You are about to permanently delete this post,\n Are you sure?.",
																showCancelButton: true,
																confirmButtonText: "Confirm, Submit!",
																cancelButtonText: "No, Cancel !",
																closeOnConfirm: false,
																closeOnCancel: false
												}, function(isConfirm) {
																if (isConfirm) {

																				var form_route = id
																				var form_action = '{{ route('author.posts.destroy', ['post' => $post->id]) }}';
																				//document.getElementById("postForm").action = form_action + form_route;
																				document.getElementById("postForm").action = form_action;
                                                                                document.getElementById("postForm").submit();

																				swal("Success!", "The post has been deleted.", "success");

																} else {
																				swal("Cancelled", "Request Canceled :)", "error");
																}
												});

								}

								function showDiv() {
												const el = document.getElementById('comment-cont');

												const hiddenDiv = document.getElementById('hidden-div');
												el.addEventListener('mouseover', function handleMouseOver() {
																hiddenDiv.style.visibility = 'visible';
												});

												el.addEventListener('mouseout', function handleMouseOut() {
																hiddenDiv.style.visibility = 'hidden';
												});
								}
				</script>
@endsection
