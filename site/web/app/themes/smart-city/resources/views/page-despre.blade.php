@extends('layouts.app')

@section('content')
  @include(
    'partials.page-header',
    ['title' => pll__('Despre')]
  )
  @include('partials.despre-content-page')
@endsection
