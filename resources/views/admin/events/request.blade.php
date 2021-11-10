
@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Тип</th>
                                    <th>Клуб</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)

                                    <tr>
                                        <td>{{$event->id}}</td>
                                        <td>{{$event->title}}</td>
                                        <td>{{$event->type}}</td>
                                        <td>{{$event->club->title}}</td>
                                        <td>
                                            <form action="{{route('admin.events.destroy', $event)}}" class="d-inline" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="c-icon cil-trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{route('admin.events.edit', $event)}}" class="btn btn-outline-success btn-sm">
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
                                            {{$events->links()}}
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
