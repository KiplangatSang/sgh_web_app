<div class="post-preview">
				@php
								//	$url = urlencode(htmlspecialchars($post->post_id));
				@endphp
				<a href="/{{ urlencode(htmlspecialchars($post->post_id)) }}">
								<h4 class="post-title">{!! $post->post_title !!}</h4>
								<p class="post-subtitle">{!! $post->post_subtitle !!}</p>

								<div class="row">
												@if ($post['post_top_image'] != null)
																@foreach ($post['post_top_image'] as $image)
																				<img src="{{ $image }}" alt="Capture Image" class="capture_image p-1 m-1">
																@endforeach
												@endif
								</div>
								<h6 class="meta"> <small>
																Story by
																<a href="#!" class="text-info">{{ $post->postable()->first()->name }}</a>
																about {{ $post->created_at->diffForHumans() }}</small>
												{{--  on {{ $post->created_at->format('D M Y  H:II') . ' hrs' }}</small>  --}}
								</h6>
				</a>
</div>
