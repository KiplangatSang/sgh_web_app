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
												@include('post.inc.googletwoads')
												<!-- google ads-->
								</div>
								<div class="row gx-4 gx-lg-5">
												@if (count($techdata['posts']) > 0)
																<div class="col-md-8 col-lg-7 col-xl-7">
																				@foreach ($techdata['posts'] as $post)
																								<!-- Post preview-->
																								@include('post.inc.postimage')
																								<!-- Divider-->
																								<hr class="my-4" />
																				@endforeach

																				<div class="mx-auto d-flex justify-content-center">
																								{{ $techdata['posts']->links() }}
																				</div>


																				<!-- Pager-->
																				<div class="row">
																								<!-- google ads-->
																								@include('post.inc.googleonead')
																								<!-- google ads-->
																				</div>

																</div>
												@endif
												<div class="col-md-4 col-lg col-xl">
																@if ($techdata['recomended'])
																				@if (count($techdata['recomended']) > 0)
																								<h3 class="text-info">Recommended for you</h3>
																								<div class="row">
																												@foreach ($techdata['recomended'] as $recomended)
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
																												{{ $techdata['recomended']->links() }}

																												<div class="col-md-2 col-xl-2 p-1">
																																<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9116569436922792"
																																				crossorigin="anonymous"></script>
																																<!-- responsive-square -->
																																<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9116569436922792"
																																				data-ad-slot="2577375845" data-ad-format="auto" data-full-width-responsive="true"></ins>
																																<script>
																																				(adsbygoogle = window.adsbygoogle || []).push({});
																																</script>
																												</div>
																								</div>
																				@endif
																@else
																				<div class="row">
																								<!-- google ads-->
																								@include('post.inc.googleonead')
																								<!-- google ads-->
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
