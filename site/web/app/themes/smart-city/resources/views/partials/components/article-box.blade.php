<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="article-box">
    <h3>{{ $articol['title'] }}</h3>
    <div class="article-img-wrapper">
      <img src="{{ $articol['image'] }}" />
    </div>
    <div class="excerpt">
      {{ $articol['excerpt'] }}
    </div>
    <a href="{{ $articol['permalink'] }}">
      {{ pll__('Citește') }} >
    </a>
  </div>
</div>
