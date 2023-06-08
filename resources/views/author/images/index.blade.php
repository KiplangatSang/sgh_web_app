@extends('layouts.app')

@section('content')
				<div class="container-fluid">
								<div class=" col-md-8 col-xl-8 tile mx-auto">
												<div class="row">
																@foreach ($images as $key => $image)
																				<div class="col-xl-4 col-md-6 mt-2">
																								<div class="card">
																												<div class="card-header">
																																<div class="row d-flex justify-content-center">
																																				<div class="col-md">
																																								@if ($image->image)
																																												<input type="text" class="form-control float-left ml-auto" name="image-url"
																																																value="{{ $image->image }}" id="imageUrlInput{{ $key }}" disabled>
																																								@endif
																																								@if ($image->post_top_image)
																																												<input type="text" class="form-control float-left ml-auto"
																																																name="image-url{{ $key }}" value="{{ $image->post_top_image }}"
																																																id="imageUrlInput{{ $key }}">
																																								@endif
																																				</div>
																																				<div class="col-md-3">
																																								<button class="btn btn-secondary float-right mr-auto  btn-sm"
																																												onclick="copyImageUrl('imageUrlInput'+@json($key),'imageUrlBtn'+@json($key))"
																																												id="imageUrlBtn{{ $key }}"><i class="fa-2x fa fa-file-o"></i>Copy</button>
																																				</div>
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
																																</div>
																												</div>
																												<div class="card-footer">
																																<div class="row d-flex justify-content-center">
																																				<button class="btn btn-outline-info float-left ml-auto  btn-sm mr-1"
																																								onclick="event.preventDefault(); document.getElementById('sessionimageform'+@json($key)).submit();"
																																								id="imageUrlBtn{{ $key }}">Save Selection</button>
																																				<button class="btn btn-outline-success float-right mr-auto  btn-sm ml-2"
																																								onclick="event.preventDefault(); document.getElementById('sessiontitleimageform'+@json($key)).submit();"
																																								id="imageUrlBtn{{ $key }}">Set top image</button>
																																</div>
																																<div class="d-none">

																																				<form action="{{ route('author.storesessionimage') }}" method="POST"
																																								id="sessionimageform{{ $key }}">
																																								@csrf
																																								<input type="text" class="form-control" name="image"
																																												value="{{ $image->image ?? $image->post_top_image }}">
																																				</form>
																																				<form action="{{ route('author.storesessionimage') }}" method="POST"
																																								id="sessiontitleimageform{{ $key }}">
																																								@csrf
																																								<input type="text" class="form-control" name="image_title"
																																												value="{{ $image->image ?? $image->post_top_image }}">
																																				</form>
																																</div>
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

												//alert(inputId);

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
