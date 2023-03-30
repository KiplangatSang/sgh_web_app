@extends('layouts.post')
@section('content')
				<div>
								<!-- Page Header-->
								<header class="masthead ">
												<div class="container position-relative  px-lg ">
																<div class="row  gx-lg justify-content-center">
																				<div class="col-md-10 col-xl-10 ">
																								<div class="row ">
																												<div class="d-flex justify-content-center m-2">
																																<h1>{{ $postdata['post']->post_title }}</h1>
																												</div>
																												{{-- <div class="sub-heading d-flex justify-content-center m-1">
                            <h5>{{ $postdata['post']->post_subtitle }}</h5>
                    </div> --}}
																												<div class="row d-flex justify-content-center mx-auto">
																																@if ($postdata['post']->post_top_image != null)
                                                                                                                                @php
                                                                                                                                    $postImages = json_decode($postdata['post']->post_top_image)
                                                                                                                                @endphp
																																				@foreach ( $postImages as $image)
																																								<div class="col-md-6 col-xl-3 d-flex justify-content-center m-1">
																																												<img src="{{ $image }}" alt="Capture Image"
																																																class="p-1 d-flex w-100 img-thumbnail rounded">
																																								</div>
																																				@endforeach
																																@endif
																												</div>
																												<div class="d-flex justify-content-center m-2">
																																<h6 class="meta"> <small>
																																								{{ $postdata['post']->created_at->format('D M d/m Y ') }}</small>
																																</h6>
																												</div>

																								</div>
																				</div>
																				{{-- <div class="col-md-2 col-xl-2 p-1">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5005358454303953" crossorigin="anonymous"></script>
                    <!-- StormsAdd -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5005358454303953" data-ad-slot="8840350149" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});

                    </script>
                </div>  --}}
																</div>
												</div>
								</header>
								<!-- Post Content-->
								<article class="mb-2 ">
												<div class="container-fluid">
																<div class="row ">
																				<div class="col-md-6 col-lg-7 col-xl-8 mx-auto">
																								<p>{!! $postdata['post']->post_body !!}</p>
																								<p>
																												<small>Story writen by
																																<a
																																				href="#">{{ $postdata['post']->postable()->first()->name }}</a>
																																&middot;
																																@if ($postdata['post']->post_top_image)
																																				Images by
																																				<a
																																								href="#">{{ $postdata['post']->postable()->first()->name }}</a>
																												</small>
																												@endif
																								</p>
																				</div>
																</div>
																<div class="row">
																				<div class="col-md-4 col-lg-7 col-xl p-5">
																								<hr>
																								@if (count($postdata['newposts']) > 0)
																												<h5 class="text-info">Recommended for you</h5>
																												<div class="row">
																																@foreach ($postdata['newposts'] as $recomended)
																																				<!-- recomended preview-->
																																				<div class="col-sm col-md-4 col-xl-4 col-lg-4">
																																								<!-- recomended preview-->
																																								@include('post.inc.recomended')
																																								<!-- Divider-->
																																								<hr class="my-4" />
																																								<br>
																																				</div>
																																@endforeach
																												</div>
																								@else
																												<div class="jumbotron p-3">
																																<h3 class="text-info">Refresh to get new updates</h3>
																												</div>
																								@endif

																								<div class="mx-auto d-flex justify-content-center">
																												{{ $data['posts']->links() }}

																								</div>
																								<br>
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

																				</div>
																</div>

								</article>
				</div>
@endsection
