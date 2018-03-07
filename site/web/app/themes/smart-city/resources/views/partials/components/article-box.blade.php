<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="article-box">
    <h3>{{ $articol['title'] }}</h3>
    <img src="{{ $articol['image'] }}" />
    <div class="excerpt">
      {{ $articol['excerpt'] }} 
    </div>
    <a href="{{ $articol['permalink'] }}">
      {{ pll__('Citește') }} >
    </a>
  </div>
</div>
