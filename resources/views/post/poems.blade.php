@extends('layouts.post')
@section('content')
				<div>


								<!-- Page Header-->
								@include('inc.posts_header')
								<!-- Main Content-->
								<div class="container">
												<div class="row">
																<!-- google ads-->
																<div class="row">
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
																												<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9116569436922792"
																																crossorigin="anonymous"></script>
																												<!-- responsive-square -->
																												<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9116569436922792"
																																data-ad-slot="2577375845" data-ad-format="auto" data-full-width-responsive="true"></ins>
																												<script>
																																(adsbygoogle = window.adsbygoogle || []).push({});
																												</script>
																								</div>
																				@else
																								<div class="jumbotron p-3">
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
																												<h3 class="text-info">Refresh to get new updates</h3>
																								</div>
																				@endif


																</div>
												</div>
                                                <div class="row">
                                                    <!-- google ads-->
                                                    <div class="row">
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
                                    <div class="row">
                                        <!-- google ads-->
                                        <div class="row">
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
								</div>
				</div>
@endsection
