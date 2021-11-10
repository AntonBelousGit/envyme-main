
<h1>Ответ с callback формы</h1>

<p><strong>Имя:</strong> {{ $data->name }}</p>
<p><strong>Почта:</strong> {{ $data->email }}</p>
<p><strong>Сообщение:</strong> {{ $data->comment }}</p>
<p><strong>Телефон:</strong> {{ $data->phone_number }}</p>
<p><strong>Название ивента:</strong> {{ $data->event_title }}</p>
<p><strong>Тип ивента:</strong> {{ $data->event_type }}</p>
<p><strong>Токен:</strong> {{ $data->token }}</p>

{{--{!! QrCode::size(200)->generate('Zalupa'); !!}--}}

{{--<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('image.png', 0.3, true)--}}
{{--                        ->size(500)->errorCorrection('H')--}}
{{--                        ->generate('http://jobtools.ru')) !!} ">--}}

{{--<img src="{!!$message->embedData($data->code, 'QrCode.png', 'image/png')!!}">--}}

<img src="{!!$message->embedData(QrCode::format('png')->generate($data->token), 'QrCode.png', 'image/png')!!}">
