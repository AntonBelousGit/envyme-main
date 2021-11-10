
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
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)

                            <tr>
                                <td>{{$page->id}}</td>
                                <td>{{$page->name}}</td>
                                <td>{{$page->description}}</td>
                                <td>
                                    <form action="{{route('admin.pages.destroy', $page)}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="c-icon cil-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('admin.pages.edit', $page)}}" class="btn btn-outline-success btn-sm">
                                        <i class="c-icon cil-pencil"></i>
                                    </a>
                                    <a href="{{route('admin.pages.edit', $page)}}" class="btn btn-outline-primary btn-sm">
                                        <i class="c-icon cil-cog"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                    <p>{{count($pages)}} продуктов из {{$count}} </p>

                    {{-- @if ($pages->total() > $count)
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        {{$pages->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->

    @endsection
