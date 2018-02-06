@extends('layout')

@section('title')
   page - @if (!empty($page)) {{ $page->title }} @endif
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="main-content-section">
                    <div class="banner-section">
                        <img src="{{ asset("img/banner-home.jpg") }}" alt="" />
                    </div>
                    @if (!empty($page))
                    <h1>{{ $page->title }}</h1>
                    <div>{!! $page->body !!}</div>
                    @else
                       <h1>Empty Page</h1>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                sidebar
            </div>
        </div>
    </div>
@endsection