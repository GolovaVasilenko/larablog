@extends('layouts.app')

@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Листинг сущности</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{ route('users.create') }}" class="btn btn-success">Добавить</a>
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
                                        aria-label="ID: activate to sort column descending" style="width: 79px;">ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Имя: activate to sort column ascending" style="width: 115px;">Имя
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="E-mail: activate to sort column ascending" style="width: 300px;">
                                        E-mail
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Аватар: activate to sort column ascending" style="width: 334px;">
                                        Аватар
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Действия: activate to sort column ascending" style="width: 197px;">
                                        Действия
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img src="{{ $user->getAvatar() }}" alt="" class="img-responsive" width="150">
                                    </td>
                                    <td><a href="{{ route('users.edit', $user->id) }}" class="fa fa-pencil"></a>
                                        {{ Form::open(['route' => ['users.destroy', $user->id],
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
    @endsection