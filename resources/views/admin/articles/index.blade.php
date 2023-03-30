@extends('admin.layouts.app')
@section('content')
				<div class="row p-3 mx-aut">
								<div class="col-lg-4  col-xl-4 mt-2">
												<div class="tile">


																<div class="tile-body">
																				<div class="tile ">
																								<div class="row">
																												<h4>My Posts</h4>

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
																								<a href="/post/show/{{ $post->id }}" class="btn btn-secondary">View</a>

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
