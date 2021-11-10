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
                    <form method="POST"  action="{{route('admin.events.store')}}" data-toggle="validator" id="add" enctype="multipart/form-data">
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
                                        <input type="text" name="title" class="form-control" id="name" placeholder="Наименование ивента" value="{{old('title')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Должно быть уникальным" value="{{old('slug')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="information">Информация</label>
                                        <textarea name="information" class="form-control" id="description" placeholder="Информация об ивенте" required>
                                    {{old('information')}}
                                </textarea>
                                    </div>
                                    @error('information')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="information2">Дополнительная информация</label>
                                        <textarea name="additional_information" id="information2" class="form-control" required>
                                    {{old('additional_information')}}
                                </textarea>
                                    </div>
                                    @error('additional_information')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="city">Аудитория</label>
                                        <select name="features[]" id="city" class="form-control" required>
                                            @foreach($gender as $item)

                                                <option value="{{$item->title}}">{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="city">Города</label>
                                        <select multiple name="features[]" id="city" class="form-control" required>
                                            @foreach($cities as $city)
                                                <option value="{{$city->title}}" >{{$city->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="event">Тип ивента</label>
                                        <select id="event" name="type" class="form-control" required>
                                            <option value="package">Package</option>
                                            <option value="activity">Activity</option>
                                        </select>
                                    </div>
                                    @error('type')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="amount_person">Amount person</label>
                                        <input type="number" id="amount_person" name="amount_person" step="1" value="{{old('amount_person')}}" class="form-control" required>
                                    </div>
                                    @error('amount_person')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="date">Время конца работы</label>
                                        <input type="date" id="date" name="date" value="{{old('date')}}" class="form-control" required>
                                    </div>
                                    @error('date')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="price">Цена билета</label>
                                        <input type="number" name="price" min="0" value="{{old('price')}}" step="0.01" class="form-control" required>
                                    </div>
                                    @error('price')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="clubs">Клубы</label>
                                        <select name="clubs_id[]" id="clubs" multiple class="form-control" required>
                                            @foreach($clubs as $club)
                                                <option value="{{$club->id}}">{{$club->title}}</option>
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
                                        <input type="text" name="title_ru" class="form-control" id="name" placeholder="Наименование ивента" value="{{old('title_ru')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="information">Информация</label>
                                        <textarea name="information_ru" id="content" class="form-control" id="description_ru" placeholder="Информация об ивенте" required>
                                    {{old('information_ru')}}
                                </textarea>
                                    </div>
                                    @error('information_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="information3">Дополнительная информация</label>
                                        <textarea name="additional_information_ru" id="information3" class="form-control" required>
                                    {{old('additional_information_ru')}}
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
                                        <input type="text" name="title_fi" class="form-control" id="name" placeholder="Наименование ивента" value="{{old('title_fi')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="description4">Информация</label>
                                        <textarea name="information_fi" id="description4" class="form-control" id="description_ru" placeholder="Информация об ивенте" required>
                                    {{old('information_fi')}}
                                </textarea>
                                    </div>
                                    @error('information_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="information4">Дополнительная информация</label>
                                        <textarea name="additional_information_fi" id="information4" class="form-control" required>
                                    {{old('additional_information_fi')}}
                                </textarea>
                                    </div>
                                    @error('additional_information_ru')
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
                                        <input type="text" name="title_et" class="form-control" id="name" placeholder="Наименование ивента" value="{{old('title')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="information5">Информация</label>
                                        <textarea name="information_et"  class="form-control" id="information5" placeholder="Информация об ивенте" required>
                                    {{old('information_ru')}}
                                </textarea>
                                    </div>
                                    @error('information_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="additional_information_et">Дополнительная информация</label>
                                        <textarea name="additional_information_et" id="additional_information_et" class="form-control" required>
                                    {{old('additional_information')}}
                                </textarea>
                                    </div>
                                    @error('additional_information_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>


                        <div class="gallery">
                            <div class="row">
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
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
@section('script')
    <script src="{{asset('js/admin/addEventPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeEventPhoto.js')}}"></script>
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('description4');
        CKEDITOR.replace('information2');
        CKEDITOR.replace('information3');
        CKEDITOR.replace('information4');
        CKEDITOR.replace('information5');
        CKEDITOR.replace('additional_information_et');
    </script>
@endsection


