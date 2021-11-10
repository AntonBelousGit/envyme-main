
<h1>Tickets purchased</h1>
<div class="container">
    <div class="row">
        <div class="table-responsive">
            <p>Name: {{$club_offer[4]['name']}}</p>
            <p>Surname: {{$club_offer[4]['surname']}}</p>
            <p>Nickname: {{$club_offer[4]['nickname']}}</p>
            <p>Email: {{$club_offer[4]['email']}}</p>
            <p>Price for each: {{$club_offer[1]}}</p>
            <p>Count: {{$club_offer[0]}}</p>

            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Token</th>
                    <th>Qrcode</th>
                </tr>
                </thead>
                <tbody>

                @foreach($club_offer[5] as $order)

                    <tr>

                        <td>{{$order}}  </td>
                        <img src="{!!$message->embedData(QrCode::format('png')->generate($order), 'QrCode.png', 'image/png')!!}">

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
