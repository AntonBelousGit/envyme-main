@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <script>
                function titleOpen(elem) {
                    var tab = $(elem);
                    $(tab).siblings(".tab-title").removeClass("open");
                    $(tab).addClass("open");
                }
            </script>
            <div class="col-md-12">
                <div class="box">
                    <form method="POST"  action="{{route('admin.clubs.store')}}" data-toggle="validator" id="add" enctype="multipart/form-data">
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
                                        <input type="text" name="title" class="form-control" id="name" placeholder="Наименование товара" value="{{old('title')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                        @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Должен быть уникальным" value="{{old('slug')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="{{old('description')}}">
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    @foreach($features as $feature)
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="features[]" value="{{$feature->title}}"> {{$feature->title}}
                                            </label>
                                        </div>
                                    @endforeach

                                    <div class="form-group has-feedback">
                                        <label for="city">Города</label>
                                        <select multiple name="features[]" id="city" class="form-control" required>
                                            @foreach($cities as $city)

                                                <option value="{{$city->title}}">{{$city->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label for="from_time">Время начала работы</label>
                                        <input type="time" id="from_time" name="from_time" value="{{old('from_time')}}">
                                    </div>
                                    @error('from_time')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="to_time">Время конца работы</label>
                                        <input type="time" id="to_time" name="to_time" value="{{old('to_time')}}">
                                    </div>
                                    @error('to_time')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror


                                    <div class="form-group has-feedback">
                                        <label for="map">Аддресс</label>
                                        <input type="text" name="map" class="form-control" value="{{old('map')}}" required>
                                    </div>
                                    @error('map')
                                            <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="map">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{old('email')}}" required>
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="price">Цена билета</label>
                                        <input type="number" name="price" min="0" value="0" step="0.01" required>
                                    </div>
                                    @error('price')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror


                                    <div class="form-group has-feedback">
                                        <label for="price">Скидка</label>
                                        <select name="discount" id="city" class="form-control" required>
                                            <option value="0">0%</option>
                                            <option value="20">-20%</option>
                                            <option value="30">-30%</option>
                                            <option value="50">-50%</option>
                                        </select>
                                    </div>
                                    @error('discount')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab2">
                                <div class="regulations-content">
                                    <h2>Russian</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Название страницы</label>
                                        <input type="text" name="title_ru" class="form-control" id="name" placeholder="Наименование товара" value="{{old('title_ru')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" name="description_ru" class="form-control" id="description" placeholder="Описание" value="{{old('description_ru')}}">
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="map">Аддресс</label>
                                        <input type="text" name="map_ru" class="form-control" value="{{old('map_ru')}}" required>
                                    </div>

                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab3">
                                <div class="regulations-content">
                                    <h2>Finnish</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Название страницы</label>
                                        <input type="text" name="title_fi" class="form-control" id="name" placeholder="Наименование товара" value="{{old('title_fi')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" name="description_fi" class="form-control" id="description" placeholder="Описание" value="{{old('description_fi')}}">
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="map">Аддресс</label>
                                        <input type="text" name="map_fi" class="form-control" value="{{old('map_fi')}}"  required>
                                    </div>


                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab4">
                                <div class="regulations-content">
                                    <h2>Estonian</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Название страницы</label>
                                        <input type="text" name="title_et" class="form-control" id="name" placeholder="Наименование товара" value="{{old('title_et')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" name="description_et" class="form-control" id="description" placeholder="Описание" value="{{old('description_et')}}">
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="map">Аддресс</label>
                                        <input type="text" name="map_et" class="form-control" value="{{old('map_et')}}" required>
                                    </div>


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
    <script src="{{asset('js/admin/addClubPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeClubPhoto.js')}}"></script>
@endsection


