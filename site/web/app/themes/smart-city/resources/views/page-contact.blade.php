@extends('layouts.app')

@section('content')
  @include(
    'partials.page-header',
    ['title' => pll__('Contact')]
  )
  @include('partials.contact-content-page')
@endsection
