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
																																@if (session('images'))
																																				{{-- {{ dd(session('images'))}} --}}
																																				@foreach (session('images') as $key => $image)
																																								<div class="row m-1">
																																												<div class="col-md-2 icon m-1">
																																																<img src="{{ $image }}" alt="title image" width="35" height="35">
																																												</div>
																																												<input type="text" value="{{ $image }} "
																																																id="imageUrlInput{{ $key }}" class="disabled">

																																												<button class="btn btn-secondary ml-2"
																																																onclick="copyImageUrl('imageUrlInput'+@json($key),'imageUrlBtn'+@json($key))"
																																																id="imageUrlBtn{{ $key }}">Copy</button>
																																								</div>
																																				@endforeach
																																@endif
																												</div>
																												<div class="tile-body">
																																<p>Drag and drop here.</p>
																																<form class="text-center dropzone " method="POST" enctype="multipart/form-data"
																																				action="/post/image/store/1" id="image-upload">
																																				@csrf
																																				<div class="dz-message" name="images">Drop article images here or click to
																																								upload<br>

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
								<div class=" col-md-8 col-xl-8">
												@if (session('image_title'))
																{{-- {{ dd(session('images'))}} --}}
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
																								<div class="dz-message" name="images">Drop files here or click to upload<br>

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

												<form method="POST" action="/user/post/update-article-desc/{{ $postdata['post']->post_id }}"
																enctype="multipart/form-data" id="articleForm">
																@csrf

																<div class="form-group ">
																				<label class="text-white" for="post_category">What is the Category of your article</label>
																				<h6 class="text-white"><small id="post_title_help" class="form-text text-light">This will determine
																												where your article will be placed</small></h6>
																				<select class="form-control  @error('post_category') is-invalid @enderror" name="post_category">
																								<option value="{{ $postdata['post']->post_category }}" selected>
																												{{ $postdata['post']->post_category_name }}</option>
																								@foreach ($postdata['category'] as $category)
																												<option value="{{ $category->id }}">{{ $category->category }}</option>
																								@endforeach

																				</select>

																				@error('post_category')
																								<span class="invalid-feedback bg-white p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror



																</div>
																<div class="form-group">
																				<label class="text-white display-6" for="post_subtitle">What is the Title of your article</label>
																				<h6 class="text-white"><small id="article_title_help" class="form-text text-light">This will be
																												visible to people who visit
																												your site</small></h6>
																				<input type="heading" name="post_subtitle"
																								class="form-control @error('post_subtitle') is-invalid @enderror" id="post_subtitle"
																								aria-describedby="emailHelp" placeholder="Enter the Title of your article"
																								value="{{ $postdata['post']->post_subtitle }}">
																				@error('post_subtitle')
																								<span class="invalid-feedback bg-white p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

																<div class="form-group">
																				<label class="text-white display-6" for="post_title">What is the Subtitle of your article</label>
																				<h6 class="text-white"><small id="article_title_help" class="form-text text-light">This will be
																												visible below the title</small></h6>
																				<input type="heading" name="post_title" class="form-control @error('post_title') is-invalid @enderror"
																								id="post_title" aria-describedby="emailHelp" placeholder="Enter the Title of your article"
																								value="{{ $postdata['post']->post_title }}">
																				@error('post_title')
																								<span class="invalid-feedback bg-white p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

																<div class="form-group" id="trackingDiv"></div>
																<div class="form-group">
																				<label class="text-white" for="exampleFormControlTextarea1">Create Your Article</label>
																				{{-- <textarea name="post_body" class="textarea form-control @error('post_body') is-invalid @enderror ckeditor"
                    rows="10">{{ old('post_body') }}</textarea>
																@error('post_body')
																				<span class="invalid-feedback bg-white p-1" role="alert">
																								<strong>{{ $message }}</strong>
																				</span>
																@enderror
												</div> --}}

																				<div class="row">
																								{{-- <p><input type="submit" value="Submit"></p> --}}
																								<button type="submit" class="btn btn-success m-2" onclick="myFunction()">Proceed to Editor</button>
																								{{-- <button type="submit" class="btn btn-primary m-2">Preview Article</button> --}}
																				</div>



												</form>

								</div>
				</div>

				</div>
				<!-- CkEditor -->
				{{-- CK-Editor --}}
				<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
				<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>

				<script>
				    let myEditor;
				    ClassicEditor
				        .create(document.querySelector('#editor'))
				        .then(editor => {
				            console.log('Editor was initialized', editor);
				            myEditor = editor;
				        })
				        .catch(err => {
				            console.log(err.stack);
				        });
				</script>

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

				        /* Alert the copied text */
				        //alert("Copied the text: " + copyText.value);
				    }

				    $('#el').on('click', function() {
				        $('#tl').loadingBtnComplete();
				        $('#tb').loadingBtnComplete({
				            html: "Sign In"
				        });
				    });

				    $('#demoDate').datepicker({
				        format: "dd/mm/yyyy",
				        autoclose: true,
				        todayHighlight: true
				    });

				    $('#demoSelect').select2();
				</script>
				<script>
				    $(document).ready(function() {

				        Dropzone.options.dropzoneFrom = {
				            autoProcessQueue: false,
				            acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
				            init: function() {
				                var submitButton = document.querySelector('submit-all');
				                myDropzone = this;
				                submitButton.addEventListener("click", function() {
				                    myDropzone.autoProcessQueue();
				                });

				                this.on("complete", function() {

				                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles.length ==
				                        0) {
				                        var _this = this
				                        _this.removeAllFiles
				                    }

				                });
				            },
				        };
				    });
				</script>
@endsection
