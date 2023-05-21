@extends('layouts.post')
@section('title', 'SG-H | News | Sports |Poems | Songs | Business | Articles | Technology')
@section('description', 'SG-H | News | Sports |Poems | Songs | Business | Articles | Technology')
@section('author', 'SG-H | News | Sports |Poems | Songs | Business | Articles | Technology')
@section('content')
				<div>


								<!-- Page Header-->
								@include('inc.posts_header')
								<!-- Main Content-->
								<div class="container">
												<!-- google ads-->
												@include('post.inc.googleonead')
												<!-- google ads-->
												<div class="row gx-4 gx-lg-5 ">
																@if (count($poemdata['posts']) > 0)
																				<div class="col-md-8 col-lg-7 col-xl-7">

																								@foreach ($poemdata['posts'] as $post)
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
																												{{ $poemdata['posts']->links() }}
																								</div>


																								<!-- Pager-->

																				</div>
																@endif
																<div class="col-md col-lg col-xl">
																				@if (count($poemdata['recomended']) > 0)
																								<h3 class="text-info">Recommended for you </h3>
																								<div class="row">
																												@foreach ($poemdata['recomended'] as $recomended)
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
																												{{ $poemdata['recomended']->links() }}
																								</div>
																								<div class="col-md-2 col-xl-2 p-1">
																												<!-- google ads-->
																												@include('post.inc.googleonead')
																												<!-- google ads-->
																								</div>
																				@else
																								<div class="jumbotron p-3">
																												<div class="col-md-2 col-xl-2 p-1">
																																<!-- google ads-->
																																@include('post.inc.googleonead')
																																<!-- google ads-->
																												</div>
																												<h3 class="text-info">Refresh to get new updates</h3>
																								</div>
																				@endif


																</div>
												</div>
												<div class="row">
																<!-- google ads-->
																@include('post.inc.googletwoads')
																<!-- google ads-->
												</div>
								</div>
				</div>
@endsection
