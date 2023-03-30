@extends('admin.layouts.app')
@section('content')
				@php
								$category = $categorydata['category'];
								$categories = $categorydata['categories'];

				@endphp
				<div class="row m-1">
								<div class=" col-md-8 col-xl-8 tile">
												<form method="POST" action="/admin/articles/category/store" enctype="multipart/form-data" id="articleForm">
																@csrf
																<div class="form-group ">
																				<label for="category_class">Choose the class to categorise in</label>

																				<select class="form-control  @error('category_class') is-invalid @enderror" name="category_class">
																								<option selected disabled>{{ $category->category_class }}</option>
																								@foreach ($categories as $key => $cat)
																												<option value="{{ $key }}">{{ $cat }}</option>
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
																				<input type="heading" name="category" class="form-control @error('category') is-invalid @enderror"
																								id="category" placeholder="Enter the category eg Poems" value="{{ $category->category }}">
																				@error('category')
																								<span class="invalid-feedback  p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

																<div class="form-group">
																				<label for="exampleFormControlTextarea1">Describe the category</label>
																				<textarea name="category_description" class="form-control @error('category_description') is-invalid @enderror"
																				    rows="10">{{ $category->category_description }}
                                                                                </textarea>
																				@error('category_description')
																								<span class="invalid-feedback  p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror
																</div>

																<div class="tile-footer">
																				<div class="row mx-auto">
																								<div class="mt-2">
																												<a href="{{ route('admin.categories.index') }}"
																																class="btn btn-danger">Cancel</a>
																								</div>
																								<button type="submit" class="btn btn-success m-2"> Submit</button>

																				</div>
																</div>
												</form>

								</div>
				</div>

				</div>
				{{-- javascripts --}}
@endsection
