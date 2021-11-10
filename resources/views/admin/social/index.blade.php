
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
                                    <th>Название</th>
                                    <th>Параметры</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($social as $item)

                                    <tr>

                                        <td>{{$item->title}}</td>
                                        <td>{{$item->link}}</td>
                                        <td>
                                            <a href="{{route('admin.social.edit', $item)}}" class="btn btn-outline-success btn-sm">
                                                <i class="c-icon cil-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
{{--                        <div class="text-center">--}}

{{--                            <br>--}}
{{--                            <div class="row justify-content-center">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-body">--}}
{{--                                            {{$filters->links()}}--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
