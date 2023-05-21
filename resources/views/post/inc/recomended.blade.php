<div class="post-preview">
				<a href="/{{ $recomended->post_id }}">
								<h6 class="post-subtitle">{!! $recomended->title !!}</h6>
								<h6 class="post-subtitle">{!! $recomended->post_subtitle !!}</h6>
								<div class="row">
												@if ($recomended['post_top_image'] != null)
																@foreach ($recomended['post_top_image'] as $image)
																				<img src="{{ $image }}" alt="Capture Image" class="recomended_image w-25 p-1 m-1">
																@endforeach
												@endif
								</div>

								<p class="meta">
												<small>{{ $recomended->created_at->diffForHumans() }}</small>
												{{--  <small>{{ $recomended->created_at->format('M d Y  H:II') }}</small>  --}}
								</p>
				</a>

</div>
