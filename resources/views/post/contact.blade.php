@extends('layouts.post')
@section('content')
				<div>

								<!-- Page Header-->
								@include('inc.posts_header')
								<!-- Main Content-->
								<main class="mb-4">
												<div class="container px-4 px-lg-5">
																<div class="row">
																				<!-- google ads-->
																				<div class="row">
																								<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9116569436922792"
																												crossorigin="anonymous"></script>
																								<!-- responsive-square -->
																								<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9116569436922792"
																												data-ad-slot="2577375845" data-ad-format="auto" data-full-width-responsive="true"></ins>
																								<script>
																												(adsbygoogle = window.adsbygoogle || []).push({});
																								</script>
																				</div>

																</div>
																<div class="row gx-4 gx-lg-5 justify-content-center">
																				<div class="col-md-10 col-lg-8 col-xl-7">
																								<p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as
																												soon as possible!</p>
																								<div class="my-2">
																												@include('inc.messages')

																												<!-- Contact form -->
																												<form id="contactForm" action="/user/contact/client/response/store" method="POST"
																																enctype="application/x-www-form-urlencoded">
																																@csrf

																																<div class="form-floating">
																																				<input class="form-control" id="name" name="name" type="text"
																																								placeholder="Enter your name..." data-sb-validations="required" required />
																																				<label for="name">Name</label>
																																				<div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
																																</div>
																																<div class="form-floating">
																																				<input class="form-control" id="email" name="email" type="email"
																																								placeholder="Enter your email..." data-sb-validations="required,email" required />
																																				<label for="email">Email address</label>
																																				<div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
																																				</div>
																																				<div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
																																</div>
																																<div class="form-floating">
																																				<input class="form-control" id="phone" name="phoneno" type="number"
																																								placeholder="Enter your phone number..." data-sb-validations="required" required />
																																				<label for="phone">Phone Number</label>
																																				<div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is
																																								required.</div>
																																</div>
																																<div class="form-floating">
																																				<textarea class="form-control" id="message" name="message" placeholder="Enter your message here..."
																																				    style="height: 12rem" data-sb-validations="required" required></textarea>
																																				<label for="message">Message</label>
																																				<div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
																																				</div>
																																</div>
																																<br />
																																<!-- Submit success message-->
																																<!---->
																																<!-- This is what your users will see when the form-->
																																<!-- has successfully submitted-->
																																<div class="d-none" id="submitSuccessMessage">
																																				<div class="text-center mb-3">
																																								<div class="fw-bolder text-success">Form submission successful!</div>
																																								<h4>Thanks for your response we highly appreciate</h4>

																																				</div>
																																</div>
																																<!-- Submit error message-->
																																<!---->
																																<!-- This is what your users will see when there is-->
																																<!-- an error submitting the form-->
																																<div class="d-none" id="submitErrorMessage">
																																				<div class="text-center text-danger mb-3">Error sending message!</div>
																																</div>
																																<!-- Submit Button-->
																																<button class="btn btn-secondary text-uppercase " id="submitButton"
																																				type="submit">Send</button>
																												</form>
																												<br>
																												<br>
																								</div>
																				</div>
																</div>
																<div class="row">
																				<!-- google ads-->
																				<div class="row">
																								<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9116569436922792"
																												crossorigin="anonymous"></script>
																								<!-- responsive-square -->
																								<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9116569436922792"
																												data-ad-slot="2577375845" data-ad-format="auto" data-full-width-responsive="true"></ins>
																								<script>
																												(adsbygoogle = window.adsbygoogle || []).push({});
																								</script>
																				</div>

																</div>
												</div>
								</main>

				</div>
@endsection
