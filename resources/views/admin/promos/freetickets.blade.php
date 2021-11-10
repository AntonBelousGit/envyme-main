<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Free ticket</title>
</head>
<body>
<h1>Поздравляем</h1>
<div class="container">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Tickets title</th>
                    <th>Token</th>
                    <th>Qrcode</th>
                </tr>
                </thead>
                <tbody>

                {{--                                {{dd($orders['order']['tickets'])}}--}}
                @foreach($promos as $item)

                    {{--                                    {{dd($data)}}--}}
                    <tr>
                        <td>{{$item['title']}}</td>
                        <td>{{$item['discountCode']}}  </td>
                        {{--                        <td>{!!$data = $qrcode->size(200)->generate($order['token']);!!}</td>--}}
                        <img src="{!!$message->embedData(QrCode::format('png')->generate($item['discountCode']), 'QrCode.png', 'image/png')!!}">
{{--                        <td>{{$order['price']}}</td>--}}
{{--                        <td>{{$order['club']['schedule']}} </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
