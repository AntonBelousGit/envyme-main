@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <script>
            function titleOpen(elem) {
                var tab = $(elem);
                $(tab).siblings(".tab-title").removeClass("open");
                $(tab).addClass("open");
            }
        </script>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('admin.events.update', $event)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="tabs">
                            <label for="tab1" class="tab-title open" onclick="titleOpen(this)">
                                EN </label>
                            <label for="tab2" class="tab-title" onclick="titleOpen(this)">
                                RU</label>
                            <label for="tab3" class="tab-title" onclick="titleOpen(this)">
                                FI </label>
                            <label for="tab4" class="tab-title" onclick="titleOpen(this)">
                                ET </label>
                        </div>

                        <div class="tabs-content">
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab1" checked="">
                                <div class="regulations-content">
                                    <h2>English</h2>

                                    <div class="form-group has-feedback">
                                        <label for="title">Название страницы</label>
                                        <input type="text" name="title" class="form-control" id="name" placeholder="Наименование ивента" value="{{$event->title}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Должно быть уникальным" value="{{$event->slug}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="information">Информация</label>
                                        <textarea name="information" id="information" class="form-control" placeholder="Информация об ивенте" required>
                                    {{$event->information}}
                                </textarea>
                                    </div>
                                    @error('information')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="additional_information">Дополнительная информация</label>
                                        <textarea name="additional_information" id="additional_information" class="form-control" required>
                                    {{$event->additional_information}}
                                </textarea>
                                    </div>
                                    @error('additional_information')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="city">Аудитория</label>
                                        <select name="features[]" id="city" class="form-control" required>
                                            @foreach($genderr as $gender)
                                                <option value="{{$gender->title}}" @if(in_array($gender->id, $genders_arr)) selected @endif>{{$gender->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="city">Города</label>
                                        <select multiple name="features[]" id="city" class="form-control" required>
                                            @foreach($cities as $city)
                                                <option value="{{$city->title}}" @if(in_array($city->id, $club_city)) selected @endif>{{$city->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label for="event">Тип ивента</label>
                                        <select id="event" name="type" class="form-control">
                                            <option value="package" @if($event->type === 'package') selected @endif>Package</option>
                                            <option value="activity" @if($event->type === 'activity') selected @endif>Activity</option>
                                        </select>
                                    </div>
                                    @error('type')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="amount_person">Число человек</label>
                                        <input type="number" id="amount_person" name="amount_person" step="1" value="{{$event->amount_person}}" class="form-control" required>
                                    </div>
                                    @error('amount_person')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="date">Дата</label>
                                        <input type="date" id="date" name="date" value="{{$event->date->format('Y-m-d')}}" class="form-control" required>
                                    </div>
                                    @error('date')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="price">Цена билета</label>
                                        <input type="number" name="price" min="0" value="{{$event->price}}" step="0.01" class="form-control" required>
                                    </div>
                                    @error('price')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="clubs">Клубы</label>
                                        <select name="club_id" id="clubs" class="form-control" required>
                                            @foreach($clubs as $club)
                                                <option value="{{$club->id}}" @if($club->id === $event->club->id) selected @endif>{{$club->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab2">
                                <div class="regulations-content">
                                    <h2>Russian</h2>

                                    <div class="form-group has-feedback">
                                        <label for="title">Название страницы</label>
                                        <input type="text" name="title_ru" class="form-control" id="name" placeholder="Наименование ивента" value="{{$event->title_ru}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="information2">Информация</label>
                                        <textarea name="information_ru" id="information2" class="form-control" placeholder="Информация об ивенте" required>
                                    {{$event->information_ru}}
                                </textarea>
                                    </div>
                                    @error('information_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="additional_information2">Дополнительная информация</label>
                                        <textarea name="additional_information_ru" id="additional_information2" class="form-control" required>
                                    {{$event->additional_information_ru}}
                                </textarea>
                                    </div>
                                    @error('additional_information_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab3">
                                <div class="regulations-content">
                                    <h2>Finnish</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Название страницы</label>
                                        <input type="text" name="title_fi" class="form-control" id="name" placeholder="Наименование ивента" value="{{$event->title_fi}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="information3">Информация</label>
                                        <textarea name="information_fi" id="information3" class="form-control" placeholder="Информация об ивенте" required>
                                    {{$event->information_fi}}
                                </textarea>
                                    </div>
                                    @error('information_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="additional_information3">Дополнительная информация</label>
                                        <textarea name="additional_information_fi" id="additional_information3" class="form-control" required>
                                    {{$event->additional_information_fi}}
                                </textarea>
                                    </div>
                                    @error('additional_information_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab4">
                                <div class="regulations-content">
                                    <h2>Estonian</h2>

                                    <div class="form-group has-feedback">
                                        <label for="title">Название страницы</label>
                                        <input type="text" name="title_et" class="form-control" id="name" placeholder="Наименование ивента" value="{{$event->title_et}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="information4">Информация</label>
                                        <textarea name="information_et" id="information4" class="form-control" placeholder="Информация об ивенте" required>
                                    {{$event->information_fi}}
                                </textarea>
                                    </div>
                                    @error('information_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="additional_information4">Дополнительная информация</label>
                                        <textarea name="additional_information_et" id="additional_information4" class="form-control" required>
                                    {{$event->additional_information_et}}
                                </textarea>
                                    </div>
                                    @error('additional_information_et')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>



                        <div class="gallery">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="/images/clubs/{{$event->image}}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/images/clubs/{{$event->image}}); background-repeat: no-repeat" onclick="event.preventDefault()">
                                        <div class="trash-block" data-url="{{$event->image}}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                                    </a>
                                    <input type="hidden" name="image" value="{{$event->image}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="addPhotoInput" class="add-photo">
                                        <input type="file" name="file" id="addPhotoInput" class="input-file-hidden">
                                        <div class="add-photo-title text-center">
                                            <img src="{{asset('img/plus.svg')}}" style="width: 20px;">
                                            <div class="dark-blue font-12 medium">Добавить фото</div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div id="photo-error-message" class="error-message mb-1"></div>
                            <small class="form-text text-muted">Изображения. До 5мб файл</small>
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
@section('script')
    <script>
        CKEDITOR.replace('information');
        CKEDITOR.replace('additional_information');
        CKEDITOR.replace('information2');
        CKEDITOR.replace('additional_information2');
        CKEDITOR.replace('information3');
        CKEDITOR.replace('additional_information3');
        CKEDITOR.replace('information4');
        CKEDITOR.replace('additional_information4');
    </script>
    <script src="{{asset('js/admin/addEventPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeEventPhoto.js')}}"></script>
@endsection



