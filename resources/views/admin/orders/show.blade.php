
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
                                    <th>Club tickets title</th>
                                    <th>Token</th>
                                    <th>Price</th>
                                    <th>Schedule</th>
{{--                                    <th>Действия</th>--}}
                                </tr>
                                </thead>
                                <tbody>

{{--                                {{dd($orders['order']['tickets'])}}--}}
                                @php
                                    $data = json_decode($orders['order'], true);
                                    $totalprice = 0;
                                @endphp
                                @foreach($data['tickets'] as $order)

{{--                                    {{dd($data)}}--}}
                                    <tr>
                                        <td>{{$order['club']['title']}}</td>
                                        <td>{{$order['token']}}</td>
                                        <td>{{$order['price']}}</td>
                                        <td>{{$order['club']['schedule']}}</td>
{{--                                        <td>{{$orders->status}}</td>--}}

{{--                                        <td>--}}
{{--                                            {{$order->user['name']}}--}}
{{--                                        </td>--}}

                                        <td>
{{--                                            <form action="{{route('admin.orders.destroy', $order)}}" class="d-inline" method="POST">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-outline-danger btn-sm">--}}
{{--                                                    <i class="c-icon cil-trash"></i>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                @php
                                    $totalprice += $order['price'];
                                @endphp
                                @endforeach
                                    <tfoot>
                                        <tr>
                                            <td>
                                                <b>  User: {{$data['user']['nickname']}}
                                            </td>
                                            <td>
                                                <b>  Сount tickets: {{$orders['count_tickets']}}
                                            </td>
                                            <td>
                                                <b> Total cost: {{$totalprice}}
                                            </td>
                                            <td>
                                                <b>Payment status: {{$orders['order']['status']}}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </tbody>
                            </table>
                        </div>
{{--                        <div class="text-center">--}}

{{--                            <br>--}}
{{--                            <div class="row justify-content-center">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-body">--}}
{{--                                            {{$orders->links()}}--}}
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
