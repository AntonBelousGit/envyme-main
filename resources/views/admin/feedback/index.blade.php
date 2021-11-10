

@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="card">
                            <div class="card-header">
                                Форма
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.pages.index')}}" method="GET">
                                    <div class="form-group">
                                        <label for="name">Название статьи</label>
                                        <input type="text" class="form-control" name="name" placeholder="Введите название статьи">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Искать</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cтатус</th>
                                    <th>Пользователь</th>
                                    <th>Время</th>
                                    <th>Клуб</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($feedback as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            @php

                                                switch ($item->status) {
                                                    case 0:
                                                        echo "На модерации";
                                                        break;
                                                    case 1:
                                                        echo "Опубликован";
                                                        break;
                                                    case 2:
                                                        echo "Заблокирован";
                                                        break;
                                                }
                                            @endphp

                                        </td>
                                        <td>{{$item->user->name ?? 'Пользователь удалён'}}</td>
                                        <td>{{$item->created_at->format('d/m/y H:i:s')}}</td>
                                        <td>{{$item->club->title }}</td>
                                        <td>
                                            <form action="{{route('admin.feedback.destroy', $item)}}" class="d-inline" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="c-icon cil-trash"></i>
                                                </button>
                                            </form>

                                            <a href="{{route('admin.feedback.edit', $item)}} " class="btn btn-outline-success btn-sm">
                                                <i class="c-icon cil-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">

                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            {{$feedback->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection

