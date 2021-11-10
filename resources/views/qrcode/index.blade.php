<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Спасибо за всё</h1>
<div class="container">
    <div class="row">
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

{{--                {{dd($qrcode)}}--}}
                @php
                    $qrcode;
                @endphp
{{--                --}}{{--                                {{dd($orders['order']['tickets'])}}--}}
{{--                @php--}}
{{--                    $data = json_decode($orders['order'], true);--}}
{{--                    $totalprice = 0;--}}

{{--                                    @endphp--}}
{{--                @foreach($data['tickets'] as $order)--}}

{{--                    --}}{{--                                    {{dd($data)}}--}}
{{--                    <tr>--}}
{{--                        <td>{{$order['club']['title']}}</td>--}}
{{--                        <td>{{$order['token']}}  </td>--}}
{{--                        <td>{!!$data = $qrcode->size(200)->generate($order['token']);!!}</td>--}}
{{--                        <td>{{$order['price']}}</td>--}}
{{--                        <td>{{$order['club']['schedule']}} </td>--}}
{{--                        --}}{{--                                        <td>{{$orders->status}}</td>--}}

{{--                        --}}{{--                                        <td>--}}
{{--                        --}}{{--                                            {{$order->user['name']}}--}}
{{--                        --}}{{--                                        </td>--}}

{{--                    </tr>--}}
{{--                @php--}}
{{--                    $totalprice += $order['price'];--}}
{{--                @endphp--}}
{{--                @endforeach--}}
{{--                <tfoot>--}}
                <tr>

{{--                    <td>--}}
{{--                        <b> Total cost: {{$totalprice}}--}}
{{--                    </td>--}}

                </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
