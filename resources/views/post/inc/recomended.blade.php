<div class="post-preview">
				<a onclick="event.preventDefault(); document.getElementById('post-id-form').submit();">

								<p class="post-meta"><small>{!! $recomended->post_subtitle !!}</small></p>
								<div class="row">
												@if ($recomended['post_top_image'] != null)
																@foreach ($recomended['post_top_image'] as $image)
																				<img src="{{ $image }}" alt="Capture Image" class="recomended_image w-25 p-1 m-1">
																@endforeach
												@endif
								</div>
								<h6 class="post-meta"><small>{!! $recomended->post_title !!}</small></h6>
								<p class="post-meta">
												<small>{{ $recomended->created_at->diffForHumans() }}</small>
												{{--  <small>{{ $recomended->created_at->format('M d Y  H:II') }}</small>  --}}
								</p>
				</a>
				<div class="row d-none">
								<form action="/{{ $recomended->post_title }}" id="post-id-form" method="POST">
												@csrf
												<input type="text" name="post_id" value="{{ $recomended->post_id }}">
								</form>
				</div>

</div>
