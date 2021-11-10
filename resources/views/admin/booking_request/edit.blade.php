@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
{{--                    {{route('admin.booking_request.update', $mails)}}--}}

                    <form action="" method="POST" enctype="multipart/form-data">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @method('PUT')
                        @csrf
{{--                        {{dd($event[$mail->event_id])}}--}}
                          <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $mail->name }}" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input type="text" name="surname" class="form-control" id="surname" placeholder="Surname" value="{{ $mail->surname }}">
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{ $mail->email }}">
                            </div>
                            @error('content')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group">
                                  <label for="phone_number">Phone number</label>
                                  <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="phone number" value="{{ $mail->phone_number }}">
                            </div>
                              @error('content')
                             <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                            <div class="form-group">
                              <label for="comment">Comment</label>
                              <textarea type="text" name="comment" class="form-control" id="comment" placeholder="comment">{{ $mail->comment }}</textarea>
                            </div>
                            @error('content')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                              <div class="form-group">
                                  <label for="card">Card</label>
                                  <input type="text" name="card" class="form-control" id="card" placeholder="card" value="{{ $mail->card }}">
                              </div>
                              @error('content')
                              <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                              <div class="form-group">
                                  <label for="city">City</label>
                                  <input type="text" name="city" class="form-control" id="city" placeholder="city" value="{{ $mail->city }}">
                              </div>
                              @error('content')
                              <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                              <div class="form-group">
                                  <label for="person">Person</label>
                                  <input type="text" name="person" class="form-control" id="person" placeholder="person" value="{{ $mail->person }}">
                              </div>
                              @error('content')
                              <div class="alert alert-danger">{{$message}}</div>
                              @enderror

                              <div class="form-group">
                                  <label for="event">Choice Event</label>
{{--                                  <input type="text" name="event" class="form-control" id="event" placeholder="event" value="{{ $event[$mail->event_id] }}">--}}

{{--                                  {{dd($event)}}--}}
                                  <p>Name event - {{ $event[0]->title }}</p>
                                  <p>Type event - {{ $event[0]->type }}</p>
                                  <p>Price - {{ $event[0]->price }}</p>
                              </div>
                              @error('content')
                              <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                            <div class="form-group has-feedback">
                                <label for="created_at">Дата публикации</label>
                                <input type="text" id="created_at" class="form-control" name="created_at" value="{{ $mail->created_at->format('d/m/y H:i') }}">
                            </div>
                            @error('date')
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
