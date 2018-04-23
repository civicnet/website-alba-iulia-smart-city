@extends('layouts.app')

@section('content')
  @include(
    'partials.page-header',
    ['title' => pll__('Soluții Smart City')]
  )
  @include('partials.solutii-content-page')
@endsection
