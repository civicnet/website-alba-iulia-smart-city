<div class="container-fluid solutii-listing">
  <div class="container">
    <div class="row">
      <div class="filters">

      </div>
    </div>

    <div class="row">
      @foreach (Solutii::proiecte() as $proiect)
        @include('partials/components/project-box', [ 'proiect' => $proiect ])
      @endforeach
    </div>
  </div>
  {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
</div>
