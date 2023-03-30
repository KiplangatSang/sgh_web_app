@extends('admin.layouts.app')
@section('content')
				<div class="row p-3 mx-aut">
								<div class="col-lg-4  col-xl-4 mt-2">
												<div class="tile">
																<div class="tile-title">
																				<h5 class="display-5">Account</h5>
																</div>
																<div class="tile-body">
																				<div class="tile col">
																								<img src="img_avatar.png" alt="Avatar">
																								<h5 class="display-5 mt-2">{{ auth()->user()->name ?? 'Guest' }}</h5>
																				</div>
																</div>
																<div class="tile-body">
																				<div class="tile ">
																								<div class="row">
																												<h4>Categories</h4>
																												<h5 class="display-5  mt-1 ml-2 text-info">{{ count($categorydata['categories']) }} Categories
																												</h5>
																								</div>
																								<hr>
																								<a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create Category</a>
																				</div>
																</div>

												</div>
								</div>

								<div class="col-lg-8 col-xl-8">
												@foreach ($categorydata['categories'] as $category)
																<div class="tile post-div mt-2">
																				<a href="{{ route('admin.categories.show', ['category' => $category->id]) }}"
																								class="btn btn-info">show</a>
																				<a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
																								class="btn btn-secondary">Edit</a>

																				<hr>
																				<br>
																				<h5 class="display-5">{{ $category->category_class }}</h5>

																				<h5 class="display-5">{{ $category->category }}</h5>
																				<p>{!! $category->category_description !!}</p>

																</div>
												@endforeach

								</div>

				</div>
@endsection
