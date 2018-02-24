@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-responsive">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Created At</th>
                </tr>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->created_at }}</td>
                    </tr>
                @endforeach
            @endif
            </table>
        </div>
    </div>
@endsection