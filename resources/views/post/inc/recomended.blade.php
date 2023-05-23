<div class="post-preview">
				<a href="/{{ $recomended->post_id }}">

								<p class="post-meta">{!! $recomended->post_subtitle !!} subtitle</p>
								<div class="row">
												@if ($recomended['post_top_image'] != null)
																@foreach ($recomended['post_top_image'] as $image)
																				<img src="{{ $image }}" alt="Capture Image" class="recomended_image w-25 p-1 m-1">
																@endforeach
												@endif
								</div>
								<h6 class="post-meta"><small>{!! $recomended->post_title !!} Title</small></h6>
								<p class="post-meta">
												<small>{{ $recomended->created_at->diffForHumans() }}</small>
												{{--  <small>{{ $recomended->created_at->format('M d Y  H:II') }}</small>  --}}
								</p>
				</a>

</div>
