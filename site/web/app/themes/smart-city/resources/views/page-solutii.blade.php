@extends('layouts.app')

@section('content')
  @include(
    'partials.solutii-page-header',
    ['title' => 'Soluții Smart City']
  )
  @include('partials.solutii-content-page')
@endsection
