@extends('admin.layouts.app')
@section('content')
				<div class="row m-1">
								<div class="col col-md-4">
												<div class="tile">
																<div class="tile-title">Articles</div>
																<div class="tile-body">
																				<h3 class="display-5 text-success"><small>{{ auth()->user()->name }}</small></h3>
																				<h6><small>{{ auth()->user()->email }}</small> </h6>
																				<hr>
																				<p>Current Categories</p>
																				<div class="col-lg-8 col-xl-8">
																								@foreach ($categorydata['categoriesAvailable'] as $category)
																												<div class="post-div mt-2">
																																<h5 class="display-5">{{ $category->category_class }}</h5>
																																<h5 class="display-5">{{ $category->category }}</h5>
																												</div>
																												<hr>
																								@endforeach

																				</div>
																</div>
												</div>
								</div>
								<div class=" col-md-8 col-xl-8 tile">
												<form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" id="articleForm">
																@csrf
																<div class="form-group ">
																				<label for="category_class">Choose the class to categorise in</label>

																				<select class="form-control  @error('category_class') is-invalid @enderror" name="category_class">
																								<option selected disabled> Select a class</option>
																								@foreach ($categorydata['categories'] as $key => $category)
																												<option value="{{ $key }}">
																																{{ $category }}
																												</option>
																								@endforeach
																				</select>

																				@error('category_class')
																								<span class="invalid-feedback  p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror



																</div>


																<div class="form-group">
																				<label class="display-6" for="category">Input the category</label>
																				<h6><small id="article_title_help" class="form-text">This will be
																												used to classify the poems</small></h6>
																				<input type="text" name="category" class="form-control @error('category') is-invalid @enderror"
																								id="category" placeholder="Enter the category eg Poems" value="{{ old('category') }}">
																				@error('category')
																								<span class="invalid-feedback  p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

																<div class="form-group">
																				<label for="exampleFormControlTextarea1">Describe the category</label>

																				<textarea name="category_description" placeholder="Give a short description about the category"
																				    class="textarea form-control @error('category_description') is-invalid @enderror " rows="10">{{ old('category_description') }}</textarea>
																				@error('category_description')
																								<span class="invalid-feedback  p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror
																</div>


																<div class="row">
																				{{-- <p><input type="submit" value="Submit"></p> --}}
																				<button type="submit" class="btn btn-success m-2"> Save</button>

																</div>



												</form>

								</div>
				</div>

				</div>
				{{-- javascripts --}}
@endsection
