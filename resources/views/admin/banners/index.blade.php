
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
                            <form action="{{route('admin.banners.index')}}" method="GET">
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
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Cтраницы</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)

                            <tr>
                                <td>{{$banner->id}}</td>
                                <td>{{$banner->title}}</td>
                                <td>{{$banner->description}}</td>
                                <td>{{$banner->page ?? ''}}</td>
                                <td>
                                    <form action="{{route('admin.banners.destroy', $banner)}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="c-icon cil-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('admin.banners.edit', $banner)}}" class="btn btn-outline-success btn-sm">
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
                                    {{$banners->links()}}
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
