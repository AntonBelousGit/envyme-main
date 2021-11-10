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
                                    <th>Имя</th>
                                    <th>Телефон</th>
                                    <th>Email</th>
                                    <th>Время</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mails as $mail)

                                    <tr>
                                        <td>{{$mail->id}}</td>
                                        <td>{{$mail->name}} {{$mail->surname}}</td>

                                        <td>
                                            {{$mail->phone_number}}
                                        </td>
                                        <td>
                                            {{$mail->email}}
                                        </td>
                                        <td>
                                            {{$mail->created_at->format('d/m/y H:i')}}
                                        </td>

                                        <td>
                                            <form action="{{route('admin.mails.destroy', $mail->id)}}" class="d-inline" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="c-icon cil-trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{route('admin.mails.show', $mail)}}" class="btn btn-outline-success btn-sm">
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
                                            {{$mails->links()}}
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
