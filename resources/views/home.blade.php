@extends('layouts.app')

@section('content')
				<div class="row p-3 mx-auto">
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
                                                                                                @if (count($data['posts']) > 0)
                                                                                                <a href="/user/post/index" class="btn btn-primary">View Posts</a>
                                                                                                @endif
                                                                                                <a href="/user/post/create" class="btn btn-primary">Create Post</a>

																				</div>
																				<div class="tile ">
																								<div class="row">
																												<h4>Subscribers</h4>
																												<h5 class="display-5  mt-1 ml-2 text-info">{{ count($data['posts']) }} Posts</h5>
																								</div>
																								<hr>
																								<a href="/user/post/index" class="btn btn-primary">Subscribers</a>
																				</div>
																				<div class="tile ">
																								<div class="row">
																												<h4>Comments</h4>
																												<h5 class="display-5  mt-1 ml-2 text-info">{{ count($data['posts']) }} Posts</h5>
																								</div>
																								<hr>

																				</div>
																				<div class="tile ">
																								<div class="row">
																												<h4>Likes</h4>
																												<h5 class="display-5  mt-1 ml-2 text-info">{{ count($data['posts']) }} Posts</h5>
																								</div>
																								<hr>

																				</div>
																</div>

												</div>
								</div>

								<div class="col-lg-8 col-xl-8">

												@if (count($data['posts']) < 1)
																<div class="tile post-div mt-2 p-3">

																				<h6 class="display-4">You have posts</h6>


																</div>
												@endif



												@foreach ($data['posts'] as $post)
																<div class="tile post-div mt-2">



																				<div class="row m-1">
																								<a href="/user/post/show/{{ $post->post_id }}" class="btn btn-success mr-5">View</a>

																								<input type=" form-group ml-1" value="{{ env('POST_BASE_URL') .$post->post_id }} "
																												id="postUrlInput{{ $post->id }}" class="disabled">


																								<div class="">
																												<button class="btn btn-secondary ml-2" {{-- {{ dd($post->post_id)}} --}}
																																onclick="copyImageUrl('postUrlInput'+@json($post->id),'postUrlBtn'+@json($post->id))"
																																id="postUrlBtn{{ $post->id }}">Copy Link</button>
																												{{-- 'postUrlBtn'+@json($post->id) --}}


																								</div>




																								{{-- <button>Copy</button> --}}
																				</div>


																				<hr>
																				<br>
																				<h5 class="display-5">{{ $post->post_title }}</h5>
																				<p>{!! $post->post_body !!}</p>

																				<hr>
																				<br>
																				<div class="row comment-cont" onmouseover="showDiv()">
																								<div class="col col-md-6 " >

																												<div class="m-1 row">
																																<div id="comment-cont "  >
                                                                                                                                    <div class="feature-icon p-1">
                                                                                                                                        <h4><i class="fa-light fa-comment"> Comments</i></h4>
                                                                                                                                    </div>
																																				<div id="hidden-div" class="hidden-div p-3">

																																								<a class="m-1" href="/post/comment/view/{{ $post->id }}">View</a>
																																								<div class="col">
																																												<p><strong>{{ auth()->user()->name }}</strong></p>
																																												<p class="mt-1 ml-2"><strong>{{ auth()->user()->name }}</strong>
																																												</p>
																																								</div>
																																				</div>
																																				<div>More content</div>
																																</div>

																												</div>


																								</div>
																								<div class="col col-md-3 align-center p-1">
																												<div class=" feature-icon">
																																<img src="client/reactions/like.svg" alt="Likes">
																												</div>
																								</div>
																								<div class="col col-md-3 align-left  p-1">
																												<div class=" feature-icon">
																																<img src="client/reactions/heart.svg" alt="Love">
																												</div>
																								</div>
																				</div>



																</div>
												@endforeach

								</div>

				</div>

				<script type="text/javascript">
                function showDiv() {
				        const el = document.getElementById('comment-cont');

				        const hiddenDiv = document.getElementById('hidden-div');

				        el.addEventListener('mouseover', function handleMouseOver() {
				            hiddenDiv.style.visibility = 'visible';
				        });

				        // ✅ (optionally) Hide DIV on mouse out
				        el.addEventListener('mouseout', function handleMouseOut() {
				            // 👇️ if you used visibility property to hide div
				            hiddenDiv.style.visibility = 'hidden';
				        });
				    }

				    function copyImageUrl(inputId, button_id) {
				        /* Get the text field */
				        var copyText = document.getElementById(inputId);
				        var copyButton = document.getElementById(button_id);

				        /* Select the text field */
				        copyText.select();
				        copyText.setSelectionRange(0, 99999); /* For mobile devices */

				        /* Copy the text inside the text field */
				        navigator.clipboard.writeText(copyText.value);

				        copyButton.innerHTML = "Copied";
				        copyButton.style.backgroundColor = 'white';
				        copyButton.style.color = 'green';


				    }
				</script>

				<script type="text/javascript">
				    const el = document.getElementById('comment-cont');

				    const hiddenDiv = document.getElementById('hidden-div');
				    // hiddenDiv.style.visibility = 'visible';

				    // ✅ Show hidden DIV on hover
				    el.addEventListener('mouseover', function handleMouseOver() {
				        hiddenDiv.style.visibility = 'visible';
				    });

				    // ✅ (optionally) Hide DIV on mouse out
				    el.addEventListener('mouseout', function handleMouseOut() {
				        // 👇️ if you used visibility property to hide div
				        hiddenDiv.style.visibility = 'hidden';
				    });
				</script>
@endsection
