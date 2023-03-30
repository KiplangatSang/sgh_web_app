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
																</div>
												</div>
								</div>
								<div class=" col-md-8 col-xl-8">
												<form method="POST" action="/admin/articles/category/store" enctype="multipart/form-data" id="articleForm">
																@csrf
																<div class="form-group ">
																				<label class="text-white" for="category_class">Choose the class to categorise in</label>

																				<select class="form-control  @error('category_class') is-invalid @enderror" name="category_class">
																								<option disabled selected>Choose a class</option>
																								<option value="Technical">Technical</option>
                                                                                                <option value="Business">Business</option>
																								<option value="Art">Art</option>
																								<option value="News">News</option>
																				</select>

																				@error('category_class')
																								<span class="invalid-feedback  p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror



																</div>


																<div class="form-group">
																				<label class="text-white display-6" for="category">Input the category</label>
																				<h6 class="text-white"><small id="article_title_help" class="form-text text-light">This will be
																												used to classify the poems</small></h6>
																				<input type="heading" name="category" class="form-control @error('category') is-invalid @enderror"
																								id="category" placeholder="Enter the category eg Poems" value="{{ old('category') }}">
																				@error('category')
																								<span class="invalid-feedback  p-1" role="alert">
																												<strong>{{ $message }}</strong>
																								</span>
																				@enderror

																</div>

																<div class="form-group">
																				<label class="text-white" for="exampleFormControlTextarea1">Describe the category</label>

																				<textarea name="category_description" placeholder="Give a short description about the category" class="textarea form-control @error('category_description') is-invalid @enderror "
                        rows="10">{{ old('category_description') }}</textarea>
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
