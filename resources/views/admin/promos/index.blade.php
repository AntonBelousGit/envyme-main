
@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">

                        <div class="form-group">
                            <a href="{{route('admin.promo.create')}}" class="btn btn-outline-success btn-sm">
                                Создать
                            </a>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Код</th>
                                <th>Процент</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($promos as $promo)

                                <tr>
                                    <td>{{$promo->discountCode}}</td>
                                    <td>{{$promo->discountPercent}}%</td>
                                    <td>
                                        <form action="{{route('admin.promo.destroy', $promo)}}" class="d-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="c-icon cil-trash"></i>
                                            </button>
                                        </form>
                                        <a href="{{route('admin.promo.edit', $promo)}}" class="btn btn-outline-success btn-sm">
                                            <i class="c-icon cil-pencil"></i>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection
