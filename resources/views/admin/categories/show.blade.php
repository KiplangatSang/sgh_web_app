@extends('admin.layouts.app')
@section('content')
				@php
								$category = $categorydata['category'];
				@endphp
				<div class="row p-3 mx-auto">
								<div class="col-lg-8 col-xl-8 mx-auto">
												<div class="tile post-div mt-2">
																<a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
																				class="btn btn-secondary">Edit</a>
																<a onclick="event.preventDefault();document.getElementById('delete-category-form').submit();"
																				class="btn btn-danger ml-3">Delete</a>

																<hr>
																<form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="POST"
																				id="delete-category-form">
																				@csrf
																				@method('DELETE')
																</form>
																<br>
																<h5 class="display-5">{{ $category->category_class }}</h5>

																<h5 class="display-5">{{ $category->category }}</h5>
																<p>{!! $category->category_description !!}</p>

												</div>
								</div>

				</div>
@endsection
