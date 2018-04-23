<article @php(post_class('post-listing'))>
  <a href="{{ get_permalink() }}">
    <header>
      <img src="{{ Index::featuredImage() }}" class="featured" />
    </header>
    <div class="category">
      {{ Index::category() }}
    </div>
    <h2 class="entry-title">
        {{ get_the_title() }}
    </h2>

    <div class="meta container">
      <div class="row no-gutters">
        <div class="col-5">
          <i class="fas fa-pencil-alt"></i>
          <span class="author">{{ get_the_author() }}</span>
        </div>
        <div class="col-5">
          <i class="fas fa-calendar-alt"></i>
          <time class="date">{{ get_post_time('d.M Y', true) }}</time>
        </div>
        <div class="col-2">
          <i class="fas fa-comments"></i>
          <span
            class="comments disqus-comment-count"
            data-disqus-url="{{ get_permalink() }}">
            0
          </span>
        </div>
      </div>
    </div>
  </a>
</article>
