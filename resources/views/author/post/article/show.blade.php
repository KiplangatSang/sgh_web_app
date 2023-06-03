@extends('layouts.app')
@section('content')
				<div class="container bg-white ">
								<div class="tile row">
												<div class="tile-title m-2">
																<a href="/home" class="btn btn-primary">Home</a>
												</div>
												<div class="tile-title m-2">
																<a href="/users/posts/post/{{ $postsdata['post']->post_id }}" class="btn btn-secondary">View in Web</a>

												</div>
												<div class="tile-title m-2">
																<a href="/user/post/edit/{{ $postsdata['post']->id }}" class="btn btn-info">Edit</a>

												</div>
												<div class="tile-title m-2">
																<form action="/user/post/delete/" method="POST" enctype="multipart/form-data" id="postForm">
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
                                                    <h6 class=" ml-4">Comments</h6>
                                                    <h6 class=" ml-4">Likes</h6>
                                                    <h6 class=" ml-4">Ratings</h6>
                                                    <h6 class=" ml-4">Loves</h6>
                                                </div>
												<div id="hidden-div" class="hidden-div p-3">


																<div class="col">
																				<p><strong>{{ auth()->user()->name }}</strong> Hey Sasaa</p>
																				<p class="mt-1 ml-2"><strong>{{ auth()->user()->name }}</strong> Mimi
																								staki hio
																								maneno
																				</p>
																</div>
                                                                <a class="m-1" href="/post/comment/view/{{ $postsdata['post']->id }}">View</a>
												</div>
												<div>More content</div>
								</div>

				</div>

				{{-- javascripts --}}


				<!-- Essential javascripts for application to work-->
				<script src="{{ asset('assets2/js/jquery-3.3.1.min.js') }}"></script>
				<script src="{{ asset('assets2/js/popper.min.js') }}"></script>
				<script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
				<script src="{{ asset('assets2/js/main.js') }}"></script>
				<!-- The javascript plugin to display page loading on top-->
				<script src="{{ asset('assets2/js/plugins/pace.min.js') }}"></script>

				<!-- Page specific javascripts-->

				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/select2.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dropzone.js') }}"></script>

				<!-- Page specific javascripts-->
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-notify.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/sweetalert.min.js') }}"></script>

				<!-- The javascript plugin to display page loading on top-->
				<script src="{{ asset('assets2/js/plugins/pace.min.js') }}"></script>


				<script type="text/javascript">
				    function notifyDeleteform($id) {
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

				                var form_route = $id
				                var form_action = "/user/post/delete/";
				                document.getElementById("postForm").action = form_action + form_route;
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
				    }
				</script>
@endsection
