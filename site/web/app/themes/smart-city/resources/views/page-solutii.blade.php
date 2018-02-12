@extends('layouts.app')

@section('content')
  @include(
    'partials.page-header',
    ['title' => 'Soluții Smart City']
  )
  @include('partials.content-page')
@endsection
