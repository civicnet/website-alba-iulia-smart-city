<div class="row article-cat">
  <div class="col">
    {{ get_the_category()[0]->name }}
  </div>
</div>
<div class="row article-meta">
  <div class="col-md-3 col-sm-12 meta">
    <div class="icon">
      {!! get_avatar(get_the_author_meta('ID')) !!}
    </div>
    <div class="author">
      <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author">
        <span class="title">{{ pll__('Autor') }}</span>
        <span class="value">{{ get_the_author() }}</span>
      </a>
    </div>
  </div>

  <div class="col-md-3 col-sm-12 meta">
    <div class="icon">
      <i class="fas fa-calendar-alt"></i>
    </div>
    <div class="date">
      <span class="title">{{ pll__('Publicat la') }}</span>
      <span class="value"><time>{{ get_post_time('d.M Y', true) }}</time></span>
    </div>

  </div>

  <div class="col-md-3 col-sm-12 meta">
    <div class="icon">
      <i class="fas fa-comments"></i>
    </div>
    <div class="comments">
      <span class="title">{{ pll__('Comentarii') }}</span>
      <span
        class="disqus-comment-count value"
        data-disqus-url="{{ get_permalink() }}">
        0
      </span>
    </div>
  </div>
</div>
