@extends('layouts.app')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Список постов
                <small>блога</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Список постов</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг постов</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('posts.create') }}" class="btn btn-success">Добавить</a>
                    </div>
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable no-footer"
                                       role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="ID: activate to sort column descending" style="width: 28px;">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Название: activate to sort column ascending"
                                            style="width: 293px;">Название
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Категория: activate to sort column ascending"
                                            style="width: 101px;">Категория
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Теги: activate to sort column ascending"
                                            style="width: 126px;">Теги
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Картинка: activate to sort column ascending"
                                            style="width: 110px;">Картинка
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-label="Действия: activate to sort column ascending"
                                            style="width: 97px;">Действия
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $post->id }}</td>
                                        <td>{{ $post->title }}
                                        </td>
                                        <td>{{ $post->getCategoryTitle() }}</td>
                                        <td>{{ $post->getTagsTitles() }}</td>
                                        <td>
                                            <img src="{{ $post->getImage() }}" alt="" width="100">
                                        </td>
                                        <td>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="fa fa-pencil"></a>
                                            {{ Form::open(['route' => ['posts.destroy', $post->id],
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
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
@endsection