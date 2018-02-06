@extends('layout')

@section('title')
    DDD Wellcome Home Page
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="main-content-section">
                    <div class="banner-section">
                        <img src="{{ asset("img/banner-home.jpg") }}" alt="" />
                    </div>
                    @if (!empty($home))
                    <h1>{{ $home->title }}</h1>
                    <div>{!! $home->body !!}</div>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                @if (!empty($posts))
                    @foreach ($posts as $post)
                        <a href="{{ url("/post/{$post->slug}") }}">{{ $post->title }}</a>
                        <p>{{ $post->excerpt }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection

