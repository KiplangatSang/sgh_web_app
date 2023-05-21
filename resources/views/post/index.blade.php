@extends('layouts.post')
@section('title', 'SG-H | News | Sports |Poems | Songs | Business | Articles | Technology')
@section('description', 'SG-H | News | Sports |Poems | Songs | Business | Articles | Technology')
@section('author', 'SG-H | News | Sports |Poems | Songs | Business | Articles | Technology')
@section('content')
				<div>
								@include('inc.home_header')
								<!-- Main Content-->
								<div class="container">
												@include('post.inc.googleonead')
												<div class="row gx-4 gx-lg-5 ">
																<div class="col-md-8 col-lg-7 col-xl-7">
																				@foreach ($data['posts'] as $post)
																								<!-- Post preview-->

																								<div class="post-preview">
																												<a href="/{{ $post->post_id }}">
																																@include('post.inc.postimage')
																												</a>

																								</div>
																								<!-- Divider-->
																								<hr class="my-4" />
																				@endforeach

																				<div class="mx-auto d-flex justify-content-center">
																								{{ $data['posts']->links() }}
																				</div>
																				<!-- Pager-->
																				@include('post.inc.googleonead')

																</div>
																<div class="col-md-4 col-lg-5 col-xl">
																				@if (count($data['recomended']) > 0)
																								<h3 class="text-info">Recommended for you</h3>
																								<div class="row">
																												@foreach ($data['recomended'] as $recomended)
																																<!-- recomended preview-->
																																<div class="col-sm col-md-4 col-xl-6 col-lg-6">
																																				<!-- recomended preview-->
																																				@include('post.inc.recomended')
																																				<!-- Divider-->
																																				<hr class="my-4" />
																																				<br>
																																</div>
																												@endforeach
																								</div>
																								<div class="mx-auto d-flex justify-content-center">
																												{{ $data['recomended']->links() }}
																								</div>
																				@else
																								<div class="jumbotron p-3">
																												<h3 class="text-info">Refresh to get new updates</h3>
																								</div>
																				@endif
																				<!-- google ads-->
																				@include('post.inc.googleonead')
																</div>
												</div>
												<div class="row">
																<!-- google ads-->
																<!-- google ads-->
																@include('post.inc.googlefourads')
																<!-- google ads-->
												</div>

								</div>
				</div>
@endsection
