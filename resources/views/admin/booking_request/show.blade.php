
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
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Comment</th>
            <th>Card</th>
            <th>City</th>
            <th>Person</th>
            <th>Event date</th>
            {{--                                    <th>Действия</th>--}}
        </tr>
        </thead>
        <tbody>

{{--                                        {{dd($mail)}}--}}
            <tr>
                <td>{{$mail->name}}</td>
                <td>{{$mail->surname}}</td>
                <td>{{$mail->email}}</td>
                <td>{{$mail->phone_number}}</td>
                <td>{{$mail->comment}}</td>
                <td>{{$mail->card}}</td>
                <td>{{$mail->city}}</td>
                <td>{{$mail->person}}</td>
                <td>{{Carbon\Carbon::parse($mail->date)->format('d/m/y')}}</td>

                    {{--                                            <form action="{{route('admin.orders.destroy', $order)}}" class="d-inline" method="POST">--}}
                    {{--                                                @csrf--}}
                    {{--                                                @method('DELETE')--}}
                    {{--                                                <button type="submit" class="btn btn-outline-danger btn-sm">--}}
                    {{--                                                    <i class="c-icon cil-trash"></i>--}}
                    {{--                                                </button>--}}
                    {{--                                            </form>--}}
            </tr>

        <tfoot>
        <tr>
            <td><b>Name event - {{ $event[0]->title }}</td>
            <td><b>Type event - {{ $event[0]->type }}</td>
            <td><b>Price - {{ $event[0]->price }}</td>
        </tr>
        </tfoot>
        </tbody>
    </table>
</div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
