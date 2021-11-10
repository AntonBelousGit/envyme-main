@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('admin.feedback.update', $feedback)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                               Имя: {{ $feedback->user->name }}<br>
                               Фамилия: {{ $feedback->user->surname }}<br>
                               Nickname: {{ $feedback->user->nickname }}<br>
                               Рейтинг: {{$feedback->raiting }}<br>
                               Клуб: {{  $feedback->club->title }}<br>
                               Время: {{ $feedback->created_at->format('d/m/y H:i:s') }}<br>

                            </div>
                            <input type="hidden" name="raiting" value="{{ $feedback->raiting }}">
                            <input type="hidden" name="club_id" value="{{ $feedback->club_id }}">
                            <div class="form-group has-feedback">
                                <label for="event">Cтатус</label>
                                <select id="event" name="status" class="form-control">
                                    <option value="0" @if($feedback->status == 0) selected @endif>На модерации</option>
                                    <option value="1" @if($feedback->status == 1) selected @endif>Опубликован</option>
                                    <option value="2" @if($feedback->status == 2) selected @endif>Заблокирован</option>
                                </select>
                            </div>
                            @error('type')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group has-feedback">
                                <label for="information">Тело письма</label>
                                <textarea name="message" id="message" class="form-control" placeholder="Информация об ивенте" required>
                                    {{$feedback->message}}
                                </textarea>
                            </div>
                            @error('message')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection



