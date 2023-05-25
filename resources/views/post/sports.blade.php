@extends('layouts.post')
@section('title', 'SG-H | News | Sports |Poems | Songs | Business | Articles | Technology')
@section('description', 'SG-H | News | Sports |Poems | Songs | Business | Articles | Technology')
@section('author', 'SG-H | News | Sports |Poems | Songs | Business | Articles | Technology')
@section('content')
				<!-- Page Header-->
				@include('inc.posts_header')
				<!-- Main Content-->
				<div class="container">
								<div class="row">
												<!-- google ads-->
												@include('post.inc.googleonead')
												<!-- google ads-->
								</div>
								<div class="row gx-4 gx-lg-5 ">
												@if (count($sportdata['posts']) > 0)
																<div class="col-md-8 col-lg-7 col-xl-7">
																				@foreach ($sportdata['posts'] as $post)
																								<!-- Post preview-->
																								@include('post.inc.postimage')
																								<!-- Divider-->
																								<hr class="my-4" />
																				@endforeach

																				<div class="mx-auto d-flex justify-content-center">
																								{{ $sportdata['posts']->links() }}
																				</div>

																				<!-- google ads-->
																				@include('post.inc.googleonead')
																				<!-- google ads-->
																				<!-- Pager-->

																</div>
												@endif
												<div class="col-md-4 col-lg col-xl">

																@if (count($sportdata['recomended']) > 0)
																				<h3 class="text-info">Recommended for you</h3>
																				<div class="row">
																								@foreach ($sportdata['recomended'] as $recomended)
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
																								{{ $sportdata['recomended']->links() }}
																				</div>
																@else
																				<div class="jumbotron p-3">
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
@endsection
