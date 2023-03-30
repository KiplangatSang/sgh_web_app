@extends('layouts.post')
@section('content')
				<div>
								@include('inc.posts_header')

								<!-- Main Content-->
								<div class="container">
												<div class="row gx-4 gx-lg-5 ">
																<div class="col-md-8 col-lg-7 col-xl-7">
																				@foreach ($articledata['posts'] as $post)
																								<!-- Post preview-->

																								<div class="post-preview">
																												<a href="/{{ $post->id }}">
																																@include('post.inc.postimage')
																												</a>
																								</div>
																								<!-- Divider-->
																								<hr class="my-4" />
																				@endforeach

																				<div class="mx-auto d-flex justify-content-center">
																								{{ $articledata['posts']->links() }}
																				</div>


																				<!-- Pager-->

																</div>
																<div class="col-md-4 col-lg col-xl m-2">
																				@if (count($articledata['recomended']) > 1)
																								<h3 class="text-info">Recommended for you</h3>
																								@foreach ($articledata['recomended'] as $recomended)
																												<!-- recomended preview-->
																												<div class="col-sm col-md-4 col-xl-6 col-lg-6">
																																<!-- recomended preview-->
																																@include('post.inc.recomended')
																																<!-- Divider-->
																																<hr class="my-4" />
																																<br>
																												</div>
																								@endforeach
																								<div class="mx-auto d-flex justify-content-center">
																												{{ $articledata['recomended']->links() }}
																								</div>
																								<div class="col-md-2 col-xl-2 p-1">
																												<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953"
																																crossorigin="anonymous"></script>
																												<!-- StormsAdd -->
																												<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953"
																																data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
																												<script>
																																(adsbygoogle = window.adsbygoogle || []).push({});
																												</script>
																								</div>
																				@else
																								<div class="jumbotron p-3">
																												<div class="col-md-2 col-xl-2 p-1">
																																<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953"
																																				crossorigin="anonymous"></script>
																																<!-- StormsAdd -->
																																<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953"
																																				data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
																																<script>
																																				(adsbygoogle = window.adsbygoogle || []).push({});
																																</script>
																												</div>
																												<h3 class="text-info">Refresh to get new updates</h3>
																								</div>
																				@endif

																</div>
												</div>
								</div>
				</div>
@endsection
