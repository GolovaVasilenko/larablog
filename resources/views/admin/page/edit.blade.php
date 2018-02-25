@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Редактировать страницу
            <small>для блога..</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            {!! Form::open(['route' => ['pages.update', $page->id],
                'method' => 'put']) !!}
            <div class="box-header with-border">
                <h3 class="box-title">Редактировать страницу</h3>
                @if($errors->any())
                    @include('admin.errors')
                @endif
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input name="title" type="text" class="form-control" id="exampleInputEmail1" value="{{ $page->title }}" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Текст страницы</label>
                        <textarea name="body"  class="form-control">{{ $page->body }}</textarea>
                    </div>
                </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ route('pages.index') }}" class="btn btn-default">Назад</a>
                <button class="btn btn-success pull-right">Отправить</button>
            </div>
            <!-- /.box-footer-->
            {!! Form::close() !!}
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection