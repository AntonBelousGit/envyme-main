
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
                                <th>Категория</th>
                                <th>Наименование</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $ticket)
                            <tr >
                                <td>{{$ticket->id}}</td>
                                <td>{{$ticket->title}}</td>
                                <td>{{$ticket->price}}</td>

                                <td>
                                    <form action="{{route('admin.tickets.destroy', $ticket->id )}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="c-icon cil-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('admin.tickets.edit', $ticket->id)}}" class="btn btn-outline-success btn-sm">
                                        <i class="c-icon cil-pencil"></i>
                                    </a>
{{--                                    <a href="{{route('admin.tickets.edit',$product->id)}}" title="Редактировать"><i class="fa fa-fw fa-eye"></i></a>--}}
{{--                                    &nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--                                    @if ($product->status == 0)--}}
{{--                                        <a class="delete" href="{{route('admin.tickets.returnstatus',$product->id)}}" title="Перевести status = On"><i class="fa fa-fw fa-refresh"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;--}}

{{--                                    @else--}}
{{--                                        <a class="delete" href="{{route('admin.tickets.deletestatus',$product->id)}}" title="Перевести status = Off"><i class="fa fa-fw fa-close"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;--}}
{{--                                    @endif--}}

{{--                                    @if ($product)--}}
{{--                                        <a class="delete" href="{{route('admin.tickets.deleteproduct', $product->id)}}" title="Удалить из БД"><i class="fa fa-fw fa-close text-danger"></i></a>--}}
{{--                                    @endif--}}

                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                    <p>{{count($tickets)}} продуктов из {{$count}} </p>

{{--                    @if ($tickets->total() > $tickets->count())--}}
{{--                        <br>--}}
{{--                        <div class="row justify-content-center">--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body">--}}
{{--                                        {{$tickets->links()}}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->

    @endsection
