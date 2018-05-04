<article class="post-listing">
	<a href="{{ $article['permalink'] }}">
		<header>
			<img src="{{ $article['image'] }}" class="featured" />
		</header>
		<div class="category">
      {{ $article['category'] }}
		</div>
		<h2 class="entry-title">
			{{ $article['title'] }}
		</h2>

		<div class="meta container">
			<div class="row no-gutters">
				<div class="col-5">
					<i class="fas fa-pencil-alt"></i>
					<span class="author">{{ $article['author'] }}</span>
				</div>
				<div class="col-5">
					<i class="fas fa-calendar-alt"></i>
					<time class="date">{{ date('d M Y', strtotime($article['date'])) }}</time>
				</div>
				<div class="col-2">
					<i class="fas fa-comments"></i>
					<span
						class="comments disqus-comment-count"
						data-disqus-url="{{ $article['permalink'] }}">
						0
					</span>
				</div>
			</div>
		</div>
	</a>
</article>

