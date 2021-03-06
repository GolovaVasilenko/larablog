@extends('layouts.app')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить статью
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            {{ Form::open([
                'route' => ['posts.update', $post->id],
                'files' => true,
                'method' => 'put',
            ]) }}
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем статью</h3>
                    @if($errors->any())
                        @include('admin.errors')
                    @endif
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ $post->title }}">
                        </div>

                        <div class="form-group">
                            <img src="{{ $post->getImage() }}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Лицевая картинка</label>
                            <input type="file" name="image" id="exampleInputFile">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            {{ Form::select('category_id',
                            $categories,
                            $post->category->id,
                            ['class' => 'form-control select2']) }}
                        </div>
                        <div class="form-group">
                            <label>Теги</label>
                            {{ Form::select('tags[]',
                            $tags,
                            $selectedTags,
                            ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Выберите теги']) }}
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                {{ Form::checkbox('status', 1, $post->status, ['class' => 'minimal']) }}
                                Черновик
                            </label>
                        </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Текст описание</label>
                            <textarea name="excerpt" id="" cols="30" rows="10" class="form-control">{{ $post->excerpt }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Полный текст</label>
                            <textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('posts.index') }}" class="btn btn-default">Назад</a>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        {{ Form::close() }}
        </section>
        <!-- /.content -->

@endsection