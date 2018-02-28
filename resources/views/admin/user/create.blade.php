@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добавить пользователя
            <small>приятные слова..</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    {{ Form::open(['route' => 'users.store', 'files' => true]) }}
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Добавляем пользователя</h3>
                @if($errors->any())
                    @include('admin.errors')
                @endif
            </div>

            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Пароль</label>
                        <input type="password" name="password"  class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Аватар</label>
                        <input type="file" name="avatar" id="exampleInputFile">

                        <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ route('users.index') }}" class="btn btn-default">Назад</a>
                <button class="btn btn-success pull-right">Добавить</button>
            </div>
            <!-- /.box-footer-->
            {{ Form::close() }}
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection