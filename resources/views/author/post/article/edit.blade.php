@extends('layouts.app')

@section('content')
				@php
								$post = $postdata['post'];
				@endphp
				<div class="container-fluid row">
								<div class="col-md-6 col-xl-4 tile mx-1">
												<div class="card-header">Edit your article in style</div>
												<div class="card-body">
																<h3 class="display-5 text-success"><small>{{ auth()->user()->name }}</small></h3>
																<h6><small>{{ auth()->user()->email }}</small> </h6>
																<hr>
												</div>
												<div class="card">
																<div class="card-header">
																				<h5 class="float-left">Top images</h5>
																				<a href="{{ route('author.postimages.index') }}"
																								class="btn btn-sm btn-outline-info mr-auto float-right">Browse</a>
																</div>
																<div class="card-body">
																				@if (session('image_title'))
																								<div id="titleimagediv">
																												@foreach (session('image_title') as $key => $image)
																																<div class="row d-flex justify-content-between">
																																				<div class="col-md-2 icon m-1">
																																								<img src="{{ $image }}" alt="title image" width="35" height="35">
																																				</div>
																																				<div class="col-md">
																																								<input type="text" value="{{ $image }} "
																																												id="titleimageUrlInput-{{ $key }}" class="disabled form-control">
																																				</div>
																																				<div class="col-md-3">
																																								<button class="btn btn-secondary btn-sm"
																																												onclick="copyImageUrl('titleimageUrlInput-'+@json($key),'titleimageUrlBtn-'+@json($key))"
																																												id="titleimageUrlBtn-{{ $key }}">Copy</button>
																																				</div>
																																				<div class="col-md-3">
																																								<div class="row d-flex justify-content-center">
																																												<button class="btn btn-outline-danger float-left ml-auto  btn-sm mr-1"
																																																onclick="event.preventDefault(); document.getElementById('sessiontitleimageform'+@json($key)).submit();"
																																																id="imageUrlBtn{{ $key }}">Remove</button>
																																								</div>
																																								<div class="d-none">
																																												<form action="{{ route('author.removesessionimage') }}" method="POST"
																																																id="sessiontitleimageform{{ $key }}">
																																																@csrf
																																																<input type="text" class="form-control" name="image_title"
																																																				value="{{ $key }}">
																																												</form>
																																								</div>
																																				</div>
																																</div>
																												@endforeach
																								</div>
																				@endif
																</div>
												</div>
												<hr>
												<div class="card">
																<div class="card-header">
																				<h5 class="float-left">Body Images</h5>
																				<a href="{{ route('author.postimages.index') }}"
																								class="btn btn-sm btn-outline-success mr-auto float-right">Browse</a>
																</div>
																<div class="card-body">
																				@if (session('images'))
																								@foreach (session('images') as $key => $image)
																												<div class="row d-flex justify-content-between">
																																<div class="col-md-2 icon m-1">
																																				<img src="{{ $image }}" alt="title image" width="35" height="35">
																																</div>
																																<div class="col-md">
																																				<input type="text" value="{{ $image }} "
																																								id="imageUrlInput-{{ $key }}" class="disabled form-control">
																																</div>
																																<div class="col-md-3">
																																				<button class="btn btn-secondary btn-sm"
																																								onclick="copyImageUrl('imageUrlInput-'+@json($key),'imageUrlBtn-'+@json($key))"
																																								id="imageUrlBtn-{{ $key }}">Copy</button>
																																</div>
																																<div class="col-md-3">
																																				<div class="row d-flex justify-content-center">
																																								<button class="btn btn-outline-danger float-left ml-auto  btn-sm mr-1"
																																												onclick="event.preventDefault(); document.getElementById('sessionimageform'+@json($key)).submit();"
																																												id="imageUrlBtn{{ $key }}">Remove</button>
																																				</div>
																																				<div class="d-none">
																																								<form action="{{ route('author.removesessionimage') }}" method="POST"
																																												id="sessionimageform{{ $key }}">
																																												@csrf
																																												<input type="text" class="form-control" name="image"
																																																value="{{ $key }}">
																																								</form>
																																				</div>
																																</div>
																												</div>
																								@endforeach
																				@endif
																</div>
																<div class="card-footer">

																</div>
												</div>
								</div>
								<div class="col-md-6 col-xl-7 tile">
												{{--  article-description  --}}
												<div class="article-description">
																<div class="form-group">
																				<p class=""><strong>Category:</strong>
																								{{ $postdata['post']->post_category_name }}
																				</p>
																				<hr>
																</div>
																<div class="form-group">
																				<p class=""><strong>Title:</strong> {{ $postdata['post']->post_title }}
																				</p>
																				<hr>


																</div>
																<div class="form-group">
																				<p class=""><strong>Subtitle:</strong> {{ $postdata['post']->post_subtitle }}
																				</p>
																</div>
																<hr>
												</div>
												<form method="POST"
																action="{{ route('author.post.postbody.update', ['post' => $postdata['post']->id, 'postbody' => $postdata['post']->id]) }}"
																enctype="multipart/form-data" id="postForm">
																@method('PUT')
																@csrf
																<div class="form-group" id="trackingDiv"></div>
																<div class="form-group">
																				<label for="exampleFormControlTextarea1">Edit Your Article</label>

																				<textarea name="post_body" class="textarea form-control @error('post_body') is-invalid @enderror ckeditor"
																				    rows="26">{{ $postdata['post']->post_body }}</textarea>
																				@error('post_body')
																								<span class="invalid-feedback bg-white p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror
																</div>

																<div class="row">

																				<button type="submit" class="btn btn-success m-2">Upload</button>
																				<a onclick="submitForm(@json($postdata['post']->id))" class="btn btn-success m-2">Preview
																								Article</a>
																</div>

												</form>
								</div>
				</div>
				</div>

				</div>
				<!-- CkEditor -->
				<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>


				<script type="text/javascript">
								<!-- copy button javascripts
								-->
								function
								copyImageUrl(inputId,
								button_id)
								{
								/*
								Get
								the
								text
								field
								*/
								var
								copyText
								=
								document.getElementById(inputId);
								var
								copyButton
								=
								document.getElementById(button_id);
								/*
								Select
								the
								text
								field
								*/
								copyText.select();
								copyText.setSelectionRange(0,
								99999);
								/*
								For
								mobile
								devices
								*/
								/*
								Copy
								the
								text
								inside
								the
								text
								field
								*/
								navigator.clipboard.writeText(copyText.value);
								copyButton.innerHTML
								=
								"Copied";
								copyButton.style.backgroundColor
								=
								'white';
								copyButton.style.color
								=
								'green';
								}

				<!-- submitForm preview js-->

				function submitForm(id) {
				var form_route = id;
				var form_action = '{{ route('author.post.preview', ['id' => $post->id]) }}';
				//document.getElementById("postForm").action = form_action + form_route;
				document.getElementById("postForm").action = form_action;
				document.getElementById("postForm").submit();
				}
				</script>
@endsection
