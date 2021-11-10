
<h1>
    Спасибо за всё
</h1>
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
                        <td>{{$order['token']}}  </td>
                        {{--                        <td>{!!$data = $qrcode->size(200)->generate($order['token']);!!}</td>--}}
                        <img src="{!!$message->embedData(QrCode::format('png')->generate($order['token']), 'QrCode.png', 'image/png')!!}">
                        <td>{{$order['price']}}</td>
                        <td>{{$order['club']['schedule']}} </td>
                    </tr>
                @php
                    $totalprice += $order['price'];
                @endphp
                @endforeach
                <tfoot>
                <tr>

                    <td>
                        <b> Total cost: {{$totalprice}}
                    </td>

                </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>
</div>
