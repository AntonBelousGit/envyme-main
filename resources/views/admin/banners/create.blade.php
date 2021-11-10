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
                    <form method="POST"  action="{{route('admin.banners.store')}}" data-toggle="validator" id="add" enctype="multipart/form-data">
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
                                        <label for="title">Заголовок баннера</label>
                                        <input type="text" name="title" class="form-control" id="name" placeholder="Наименование баннера" value="{{old('title')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="subtitle">Заголовок баннера 2</label>
                                        <input type="text" name="subtitle" class="form-control" id="subname" placeholder="Наименование баннера" value="{{old('subtitle')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('subtitle')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание баннера</label>
                                        <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="{{old('description')}}">
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="href">Ссылка</label>
                                        <input type="text" id="href" class="form-control" name="href" placeholder="Ссылка баннера" value="{{old('href')}}">
                                    </div>
                                    @error('href')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="page">Cтраницы</label>
                                        <select name="page" id="page" class="form-control" required>
                                                <option value="main">Главная</option>
                                                <option value="activities">Активности</option>
                                                <option value="packages">Пакеты</option>
                                                <option value="membership">Членство</option>
                                                <option value="news">Новости</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab2">
                                <div class="regulations-content">
                                    <h2>Russian</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Заголовок баннера</label>
                                        <input type="text" name="title_ru" class="form-control" id="name" placeholder="Наименование баннера" value="{{old('title_ru')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="subtitle">Заголовок баннера 2</label>
                                        <input type="text" name="subtitle_ru" class="form-control" id="subname" placeholder="Наименование баннера" value="{{old('subtitle_ru')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('subtitle_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание баннера</label>
                                        <input type="text" name="description_ru" class="form-control" id="description" placeholder="Описание" value="{{old('description_ru')}}">
                                    </div>
                                    @error('description_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror


                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab3">
                                <div class="regulations-content">
                                    <h2>Finnish</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Заголовок баннера</label>
                                        <input type="text" name="title_fi" class="form-control" id="name" placeholder="Наименование баннера" value="{{old('title_fi')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="subtitle">Заголовок баннера 2</label>
                                        <input type="text" name="subtitle_fi" class="form-control" id="subname" placeholder="Наименование баннера" value="{{old('subtitle_fi')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('subtitle_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание баннера</label>
                                        <input type="text" name="description_fi" class="form-control" id="description" placeholder="Описание" value="{{old('description_fi')}}">
                                    </div>
                                    @error('description_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror


                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab4">
                                <div class="regulations-content">
                                    <h2>Estonian</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Заголовок баннера</label>
                                        <input type="text" name="title_et" class="form-control" id="name" placeholder="Наименование баннера" value="{{old('title_et')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="subtitle">Заголовок баннера 2</label>
                                        <input type="text" name="subtitle_et" class="form-control" id="subname" placeholder="Наименование баннера" value="{{old('subtitle_et')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('subtitle_et')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание баннера</label>
                                        <input type="text" name="description_et" class="form-control" id="description" placeholder="Описание" value="{{old('description_et')}}">
                                    </div>
                                    @error('description_et')
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
    <script src="{{asset('js/admin/addBannerPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeBannerPhoto.js')}}"></script>
@endsection


