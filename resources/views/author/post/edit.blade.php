@extends('layouts.app')

@section('content')
				<div class="container-fluid">
								<div class="row">
												<div class="col-md-6 col-xl-4">
																<div class="tile">
																				<div class="tile-title">Create your article</div>
																				<div class="tile-body">
																								<h3 class="display-5 text-success"><small>{{ auth()->user()->name }}</small></h3>
																								<h6><small>{{ auth()->user()->email }}</small> </h6>
																								<hr>

																								<h6> Upload Images or Videos to be used in the blog here then refresh the page to get their urls
																								</h6>
																								<div class="card">
																												<div class="card-body">
																																<p>Drag and drop here.</p>
																																<form class="text-center dropzone " method="POST" enctype="multipart/form-data"
																																				action="{{ route('author.postimages.store') }}" id="image-upload">
																																				@csrf
																																				<div class="dz-message" name="file">Drop the files here or click to upload<br>

																																								<small class="text-info">()</small>
																																				</div>
																																</form>

																												</div>
																												<div class="card-footer">
																																@if (session('images'))
																																				@forelse (session('images') as $key => $image)
																																								<div class="row d-flex justify-content-between">
																																												<div class="col-md-2 icon">
																																																<img src="{{ $image }}" alt="{{ $image }}" width="35"
																																																				height="35">
																																												</div>
																																												<div class="col-md">
																																																<input type="text" value="{{ $image }} "
																																																				id="imageUrlInput{{ $key }}" class="form-control disabled ">

																																												</div>
																																												<div class="col-md-3">
																																																<button class="btn btn-secondary ml-2 btn-sm"
																																																				onclick="copyImageUrl('imageUrlInput'+@json($key),'imageUrlBtn'+@json($key))"
																																																				id="imageUrlBtn{{ $key }}">Copy</button>

																																												</div>
																																								</div>
																																								<hr>
																																				@empty
																																								<p>No images uploaded</p>
																																				@endforelse
																																@endif
																												</div>
																								</div>
																				</div>
																</div>
												</div>
												<div class=" col-md-6 col-xl-8 tile">
																<div class="card">
																				<div class="card-header">
																								<div class="d-flex justify-content-center">
																												<h6>Select or drop the top image(s) for your
																																article</h6>
																								</div>
																				</div>
																				<div class="card-body">
																								<div class="row">
																												<div class="col">
																																<div class="card">
																																				<div class="d-flex justify-content-center">

																																								<h6><small id="article_title_help" class="form-text">This should be
																																																catchy to attract readers</small></h6>
																																				</div>
																																				<div class="tile-body p-3">
																																								<p>Drag and drop here.</p>
																																								<form class="dropzone ce" method="POST" enctype="multipart/form-data"
																																												action="{{ route('author.storepostimagetitle') }}" id="title_image-upload">
																																												@csrf
																																												<div class="dz-message" name="file">Drop or click on box to upload<br>

																																																<small class="text-info">()</small>
																																												</div>
																																								</form>

																																				</div>
																																				@error('post_top_image')
																																								<span class="invalid-feedback p-1" role="alert">
																																												<strong>{{ $message }}</strong>
																																								</span>
																																				@enderror
																																</div>
																												</div>
																												<div class="col">
																																@if (session('image_title'))
																																				@forelse (session('image_title') as $key => $image)
																																								<div class="row d-flex justify-content-between">
																																												<div class="col-md-2 icon">
																																																<img src="{{ $image }}" alt="{{ $image }}" width="35"
																																																				height="35">
																																												</div>
																																												<div class="col-md">
																																																<input type="text" value="{{ $image }} "
																																																				id="titleUrlInput{{ $key }}"
																																																				class="disabled form-control m-2">
																																												</div>
																																												<div class="col-md-3 mr-auto">
																																																<button class="btn btn-secondary m-2  btn-sm"
																																																				onclick="copyImageUrl('titleUrlInput'+@json($key),'titleUrlBtn'+@json($key))"
																																																				id="titleUrlBtn{{ $key }}">Copy</button>
																																												</div>
																																								</div>
																																								<hr>
																																				@empty
																																								<p>No post title images uploaded </p>
																																				@endforelse
																																@endif
																												</div>
																								</div>
																				</div>
																</div>
																<br>
																<hr>
																<br>
																<div class="card">
																				<div class="card-body">
																								<form method="POST" action="{{ route('author.posts.update', ['post' => $postdata['post']->id]) }}"
																												enctype="multipart/form-data" id="articleForm">
																												@method('PUT')
																												@csrf

																												<div class="form-group ">
																																<label class="text-dark" for="post_category">Edit the Category of your article</label>
																																<h6 class="text-dark"><small id="post_title_help" class="form-text text-info">This will
																																								determine
																																								where your article will be placed</small></h6>
																																<select class="form-control  @error('post_category') is-invalid @enderror"
																																				name="post_category">
																																				<option value="{{ $postdata['post']->post_category }}" selected>
																																								{{ $postdata['post']->post_category_name }}</option>
																																				@foreach ($postdata['category'] as $category)
																																								<option value="{{ $category->id }}">{{ $category->category }}</option>
																																				@endforeach

																																</select>

																																@error('post_category')
																																				<span class="invalid-feedback p-1" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror
																												</div>
																												<hr>
																												<br>
																												<div class="form-group">
																																<label class="text-dark display-6" for="post_subtitle">Edit the Title of your
																																				article</label>
																																<h6 class="text-dark"><small id="article_title_help" class="form-text text-info">This will
																																								be
																																								visible to people who visit
																																								your site</small></h6>

																																<textarea type="heading" name="post_title" class="form-control @error('post_title') is-invalid @enderror"
																																    id="post_title" aria-describedby="emailHelp" placeholder="Enter the title of your article" cols="5">{{ $postdata['post']->post_title }}</textarea>
																																@error('post_title')
																																				<span class="invalid-feedback  p-1" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror
																												</div>
																												<hr>
																												<br>
																												<div class="form-group">
																																<label class="text-dark display-6" for="post_title">Edit the Subtitle of your
																																				article</label>
																																<h6 class="text-dark"><small id="article_title_help" class="form-text text-info">This
																																								will be
																																								visible below the title</small></h6>

																																<textarea type="heading" name="post_subtitle" class="form-control @error('post_subtitle') is-invalid @enderror"
																																    id="post_subtitle" aria-describedby="emailHelp" placeholder="Enter the subtitle of your article" cols="5">{{ $postdata['post']->post_subtitle }}</textarea>
																																@error('post_subtitle')
																																				<span class="invalid-feedback p-1" role="alert">
																																								<strong>{{ $message }}</strong>
																																				</span>
																																@enderror
																												</div>
																												<hr>
																												<br>

																												<div class="form-group" id="trackingDiv"></div>
																												<div class="form-group">
																																<label class="text-dark" for="exampleFormControlTextarea1">Click proceed to edit your
																																				article</label>

																																<div class="row">
																																				<button type="submit" class="btn btn-success m-2" onclick="myFunction()">Proceed to
																																								Editor</button>
																																</div>



																								</form>
																				</div>
																</div>

												</div>
								</div>
				</div>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dropzone.js') }}"></script>
				<script type="text/javascript">
								function copyImageUrl(inputId, button_id) {
												/* Get the text field */
												var copyText = document.getElementById(inputId);
												var copyButton = document.getElementById(button_id);

												/* Select the text field */
												copyText.select();
												copyText.setSelectionRange(0, 99999); /* For mobile devices */

												/* Copy the text inside the text field */
												navigator.clipboard.writeText(copyText.value);

												copyButton.innerHTML = "Copied";
												copyButton.style.backgroundColor = 'white';
												copyButton.style.color = 'green';

								}
				</script>

@endsection
