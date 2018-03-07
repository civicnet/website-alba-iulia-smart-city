@extends('layouts.app')

@section('content')
  @include(
    'partials.contact-page-header',
    ['title' => pll__('Contact')]
  )
  @include('partials.contact-content-page')
@endsection
