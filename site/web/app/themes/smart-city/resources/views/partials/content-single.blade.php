<article @php(post_class())>
  <header>
    @include('partials/page-header', ['title' => pll__('Blog')])
  </header>
  <div class="container-fluid article-container">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-12">
          <h1 class="entry-title">{{ get_the_title() }}</h1>
          @include('partials/entry-meta')
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="entry-content">
            @php(the_content())
          </div>

          <div class="section social-media">
            <div class="content">
              <h4>{{ pll__('Distribuie articol') }}</h4>
              <div class="row icons">
                <div class="col">
                  <i class="fab fa-facebook-square"></i>
                </div>
                <div class="col">
                  <i class="fab fa-twitter"></i>
                </div>
                <div class="col">
                  <i class="fas fa-envelope"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="section">
            <div class="content">
              <h4>{{ pll__('Articole populare') }}</h4>
            </div>
          </div>

          <div class="row justify-content-center articles">
            @foreach (Post::related() as $article)
              <div class="col-5">
                @include('partials/components/article-detailed-box', ['articol' => $article])
              </div>
            @endforeach
          </div>

          <div class="comments" style="margin-top: 100px; margin-bottom: 120px;">
            @php(comments_template('/partials/comments.blade.php'))
          </div>
        </div>

        <div class="col-md-4 col-sm-12 sidebar">
          <h3>{{ pll__('Categorii') }}</h3>
          <ul>
            <li>
              <a href="#" class="category-link">
                <span class="category">
                  General
                </span>
                <span class="count">
                  4
                </span>
              </a>
            </li>
            <li>
              <span class="category">
                General
              </span>
              <span class="count">
                4
              </span>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</article>
<script id="dsq-count-scr" src="//albaiuliasmartcity.disqus.com/count.js" async></script>
