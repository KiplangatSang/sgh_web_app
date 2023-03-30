@extends('layouts.app')

@section('content')
				<div class="row m-1">
								<div class="col col-md-4">
												<div class="tile">
																<div class="tile-title">Articles</div>
																<div class="tile-body">
																				<h3 class="display-5 text-success"><small>{{ auth()->user()->name }}</small></h3>
																				<h6><small>{{ auth()->user()->email }}</small> </h6>
																				<hr>
																				<div class="col">
																								<h6> Upload Images or Videos to be used in the blog here then refresh the page to get their urls
																								</h6>
																								<div class="tile">
																												<div class="tile-title-w-btn">
																																<h3 class="title">Drag and drop here </h3>
																												</div>
																												<div class="tile-body">
																																@foreach ($postdata['images'] as $image)
																																				<div class="row m-1">
																																								<div class="col-md-2 icon m-1">
																																												<img src="{{ $image->image }}" alt="{{ $image->image }}" width="35"
																																																height="35">
																																								</div>
																																								<input type="text" value="{{ $image->image }} "
																																												id="imageUrlInput{{ $image->id }}" class="disabled">

																																								<button class="btn btn-secondary ml-2"
																																												onclick="copyImageUrl('imageUrlInput'+@json($image->id),'imageUrlBtn'+@json($image->id))"
																																												id="imageUrlBtn{{ $image->id }}">Copy</button>
																																				</div>
																																@endforeach
																												</div>
																												<div class="tile-body">
																																<p>Drag and drop here.</p>
																																<form class="text-center dropzone " method="POST" enctype="multipart/form-data"
																																				action="/post/image/store/1" id="image-upload">
																																				@csrf
																																				<div class="dz-message" name="images">Drop the files here or click to upload<br>

																																								<small class="text-info">()</small>
																																				</div>

																																				{{-- <button class="btn btn-success" type="button" id="submit-all">Save Images</button> --}}
																																</form>

																												</div>
																								</div>



																				</div>
																</div>
												</div>
								</div>
								<div class=" col-md-8 col-xl-8 tile">

												@foreach ($postdata['top_images'] as $image)
																<div class="row m-1">
																				<div class="col-md-2 icon m-1">
																								<img src="{{ $image->post_top_image }}" alt="{{ $image->post_top_image }}" width="35"
																												height="35">
																				</div>
																				<input type="text" value="{{ $image->post_top_image }} " id="imageUrlInput{{ $image->id }}"
																								class="disabled">

																				<button class="btn btn-secondary ml-2"
																								onclick="copyImageUrl('imageUrlInput'+@json($image->id),'imageUrlBtn'+@json($image->id))"
																								id="imageUrlBtn{{ $image->id }}">Copy</button>
																</div>
												@endforeach
												<div class="form-group bg-white">
																<div class="d-flex justify-content-center">
																				<h3>Select or drop the top image(s) for your
																								article</h3>
																</div>
																<div class="d-flex justify-content-center">

																				<h3><small id="article_title_help" class="form-text">This should be
																												catchy to attract readers</small></h3>

																</div>
																<div class="tile-body p-3">
																				<p>Drag and drop here.</p>
																				<form class="dropzone ce" method="POST" enctype="multipart/form-data"
																								action="/post/image/title/store/1" id="title_image-upload">
																								@csrf
																								<div class="dz-message" name="images">Drop or click on box to upload<br>

																												<small class="text-info">()</small>
																								</div>

																								{{-- <button class="btn btn-success" type="button" id="submit-all">Save Images</button> --}}
																				</form>

																</div>


																@error('post_top_image')
																				<span class="invalid-feedback bg-white p-1" role="alert">
																								<strong>{{ $message }}</strong>
																				</span>
																@enderror

												</div>

												<form method="POST" action="/user/post/store" enctype="multipart/form-data" id="articleForm">
																@csrf

																<div class="form-group ">
																				<label class="text-dark" for="post_category">What is the Category of your article</label>
																				<h6 class="text-dark"><small id="post_title_help" class="form-text text-info">This will determine
																												where your article will be placed</small></h6>
																				<select class="form-control  @error('post_category') is-invalid @enderror" name="post_category">
																								<optgroup label="Choose the article category">
																												@foreach ($postdata['category'] as $category)
																																<option value="{{ $category->id }}">{{ $category->category }}</option>
																												@endforeach
																								</optgroup>

																				</select>

																				@error('post_category')
																								<span class="invalid-feedback bg-white p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror



																</div>
																<div class="form-group">
																				<label class="text-dark display-6" for="post_title">What is the Title of your article</label>
																				<h6 class="text-dark"><small id="article_title_help" class="form-text text-info">This will be
																												visible to people who visit
																												your site</small></h6>
																				<textarea type="heading" name="post_title" class="form-control @error('post_title') is-invalid @enderror"
																								id="post_title" aria-describedby="emailHelp" placeholder="Enter the Title of your article"
																								value="{{ old('post_title') }}" cols="5"></textarea>
																				@error('post_title')
																								<span class="invalid-feedback bg-white p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

																<div class="form-group">
																				<label class="text-dark display-6" for="post_subtitle">What is the Subtitle of your article</label>
																				<h6 class="text-dark"><small id="article_title_help" class="form-text text-info">This will be
																												visible below the title</small></h6>
																				<textarea type="heading" name="post_subtitle"
																								class="form-control @error('post_subtitle') is-invalid @enderror" id="post_subtitle"
																								aria-describedby="emailHelp" placeholder="Enter the subtitle of your article"
																								value="{{ old('post_subtitle') }}" cols="5"></textarea>
																				@error('post_subtitle')
																								<span class="invalid-feedback bg-white p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

																<div class="form-group" id="trackingDiv"></div>
																<div class="form-group">
																				<label class="text-info" for="exampleFormControlTextarea1">Click on proceed to create Your Article</label>
																				<div class="row">
																								<button type="submit" class="btn btn-success m-2" onclick="myFunction()">Proceed to
																												Editor</button>
																				</div>



												</form>

								</div>
				</div>

				</div>

				{{-- javascripts --}}
				<!-- Essential javascripts for application to work-->
				<script src="{{ asset('assets2/js/jquery-3.3.1.min.js') }}"></script>
				<script src="{{ asset('assets2/js/popper.min.js') }}"></script>
				<script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
				<script src="{{ asset('assets2/js/main.js') }}"></script>
				<!-- The javascript plugin to display page loading on top-->
				<script src="{{ asset('assets2/js/plugins/pace.min.js') }}"></script>
				<!-- Page specific javascripts-->

				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/select2.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/bootstrap-datepicker.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets2/js/plugins/dropzone.js') }}"></script>
@endsection
