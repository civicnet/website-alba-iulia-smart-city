@extends('layouts.app')

@section('content')
  @include('partials.page-header', ['title' => pll__('Blog')])

  <div class="container">
    <div class="row">
      <div class="filters">

      </div>
    </div>
    <div class="row no-gutters posts">
      @while (have_posts()) @php(the_post())
        <div class="col-md-3 col-sm-12 article-wrap">
          @include('partials.content-'.get_post_type())
        </div>
      @endwhile
    </div>
  </div>
  {!! get_the_posts_navigation() !!}
@endsection
