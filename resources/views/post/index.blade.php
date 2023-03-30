@extends('layouts.post')
@section('content')
				<div>
								@include('inc.home_header')
								<!-- Main Content-->
								<div class="container">
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


																				<!-- Pager-->

																</div>
																<div class="col-md-4 col-lg-6 col-xl">
																				{{-- {{dd($newsdata['recomended'])}} --}}
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
																												<h3 class="text-info">Refresh to get new updates</h3>
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
																				@endif


																</div>
												</div>
								</div>
				</div>
@endsection
