@extends('layouts.app')

@section('content')
				<div class="row m-1">
								<div class=" col-md-8 col-xl-8 tile">
												@if (session('image_title'))
																@foreach (session('image_title') as $key => $image)
																				<div class="row m-1">
																								<div class="col-md-2 icon m-1">
																												<img src="{{ $image }}" alt="title image" width="35" height="35">
																								</div>
																								<input type="text" value="{{ $image }} " id="imageUrlInput{{ $key }}"
																												class="disabled">

																								<button class="btn btn-secondary ml-2"
																												onclick="copyImageUrl('imageUrlInput'+@json($key),'imageUrlBtn'+@json($key))"
																												id="imageUrlBtn{{ $key }}">Copy</button>
																				</div>
																@endforeach
												@endif
												@foreach ($images as $image)
																<div class="col-xl-4 col-md-6">
																				<div class="card">
																								<div class="card-header">
																												<div class="card-title">
																																<h6>Image Name</h6>
																												</div>
																								</div>
																								<div class="card-body">
																												<div class="col">
																																<div class="row">
																																				@if ($image->image)
																																								<img class="w-100" src="{{ $image->image }}" alt="">
																																				@endif
																																				@if ($image->post_top_image)
																																								<img class="w-100" src="{{ $image->post_top_image }}" alt="">
																																				@endif
																																</div>
																																<div class="row">
																																				@if ($image->image)
																																								<input type="text" class="form-control" name="image-url"
																																												value="$image->post_top_image">
																																				@endif
																																				@if ($image->post_top_image)
																																								<input type="text" class="form-control" name="image-url"
																																												value="$image->post_top_image">
																																				@endif
																																				<div class="btn btn-info">View</div>
																																</div>
																												</div>
																								</div>
																								<div class="card-footer">
																												<div class="btn btn-info">View</div>
																												<div class="btn btn-info">Edit</div>
																								</div>
																				</div>
																</div>
												@endforeach

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
