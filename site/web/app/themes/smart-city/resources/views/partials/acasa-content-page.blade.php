<div class="container-fluid">
  <div class="container star">
    <h2>{{ pll__('Smart City Alba Iulia 2019') }}</h2>
    <div class="row">
      <div class="holder">
        <div class="alba-logo">
          @include('partials/components/glitch-filter')
          @include('partials/components/alba-logo')
        </div>
      </div>
    </div>
  </div>
  {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
</div>
