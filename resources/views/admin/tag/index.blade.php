@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Список тегов
            <small> дляа записи</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Список тегов</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Листинг Тегов</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('tags.create') }}" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>URL</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>
                                {{ $tag->title }}
                            </td>
                            <td>{{ $tag->slug }}</td>
                            <td><a href="{{ route('tags.edit', $tag->id) }}" class="fa fa-pencil"></a>
                                {{ Form::open(['route' => ['tags.destroy', $tag->id],
                                    'method' => 'delete', 'class' => 'delete']) }}
                                <button type="submit" onclick="return confirm('Вы уверены что хотите удалить елемент?')">
                                    <i class="fa fa-remove"></i>
                                </button>

                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection