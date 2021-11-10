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
                    <form action="{{route('admin.banners.update', $banner)}}" method="POST" enctype="multipart/form-data">
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
                                        <label for="title">Название баннера</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Наименование товара" value="{{ $banner->title }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="subtitle">Название баннера 2</label>
                                        <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Наименование товара" value="{{ $banner->subtitle }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('subtitle')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="{{ $banner->description }}">
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="href">Ссылка</label>
                                        <input type="text" name="href" class="form-control" id="href" placeholder="Ссылка" value="{{ $banner->href }}">
                                    </div>
                                    @error('href')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="page">Cтраницы</label>
                                        <select name="page" id="page" class="form-control" required>
                                            <option value="main" @if($banner->page == 'main') selected @endif>Главная</option>
                                            <option value="activities" @if($banner->page == 'activities') selected @endif>Активности</option>
                                            <option value="packages" @if($banner->page == 'packages') selected @endif>Пакеты</option>
                                            <option value="membership" @if($banner->page == 'membership') selected @endif>Членство</option>
                                            <option value="news" @if($banner->page == 'news') selected @endif>Новости</option>
                                        </select>
                                    </div>



                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab2">
                                <div class="regulations-content">
                                    <h2>Russian</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title_ru">Название баннера</label>
                                        <input type="text" name="title_ru" class="form-control" id="title" placeholder="Наименование товара" value="{{ $banner->title_ru }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="subtitle">Название баннера 2</label>
                                        <input type="text" name="subtitle_ru" class="form-control" id="subtitle_ru" placeholder="Наименование товара" value="{{ $banner->subtitle_ru }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('subtitle_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" name="description_ru" class="form-control" id="description_ru" placeholder="Описание" value="{{ $banner->description_ru }}">
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
                                        <label for="title_fi">Название баннера</label>
                                        <input type="text" name="title_fi" class="form-control" id="title" placeholder="Наименование товара" value="{{ $banner->title_fi }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="subtitle">Название баннера 2</label>
                                        <input type="text" name="subtitle_fi" class="form-control" id="subtitle" placeholder="Наименование товара" value="{{ $banner->subtitle_fi }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('subtitle_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" name="description_fi" class="form-control" id="description" placeholder="Описание" value="{{ $banner->description_fi }}">
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
                                        <label for="title">Название баннера</label>
                                        <input type="text" name="title_et" class="form-control" id="title" placeholder="Наименование товара" value="{{ $banner->title_et }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_et')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="subtitle">Название баннера 2</label>
                                        <input type="text" name="subtitle_et" class="form-control" id="subtitle" placeholder="Наименование товара" value="{{ $banner->subtitle_et }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('subtitle')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" name="description_et" class="form-control" id="description" placeholder="Описание" value="{{ $banner->description_et }}">
                                    </div>
                                    @error('description_et')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div class="gallery">
                            <div class="row">
                                @php $image = $banner->photo @endphp
                                <div class="col-md-3">
                                    <a href="/images/clubs/{{$image}}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/images/clubs/{{$image}}); background-repeat: no-repeat" onclick="event.preventDefault()">
                                        <div class="trash-block" data-url="{{$image}}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                                    </a>
                                    <input type="hidden" name="photo" value="{{$image}}">
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
    <script src="{{asset('js/admin/addBannerPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeBannerPhoto.js')}}"></script>
@endsection



