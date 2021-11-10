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
                    <form action="{{route('admin.news.update', $news)}}" method="POST" enctype="multipart/form-data">
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
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Наименование товара" value="{{ $news->title }}" required>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                        @error('title')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group has-feedback">
                                            <label for="title">Slug</label>
                                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Наименование товара" value="{{ $news->slug }}" required>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                        @error('slug')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="description">Описание</label>
                                            <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="{{ $news->description }}">
                                        </div>
                                        @error('description')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="content">Контент</label>
                                            <textarea name="content" class="form-control" id="content" placeholder="Контент">{{ $news->content }}</textarea>
                                        </div>
                                        @error('content')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group has-feedback">
                                            <label for="date">Дата публикации</label>
                                            <input type="date" id="data" name="date" value="{{ $news->date }}">
                                        </div>
                                        @error('date')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="wrap-regulations-content">
                                    <input type="radio" name="tab-group" class="tab" id="tab2">
                                    <div class="regulations-content">
                                        <h2>Russian</h2>

                                        <div class="form-group has-feedback">
                                            <label for="title_ru">Название страницы</label>
                                            <input type="text" name="title_ru" class="form-control" id="title_ru" placeholder="Наименование товара" value="{{ $news->title_ru }}" required>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                        @error('title_ru')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="description_ru">Описание</label>
                                            <input type="text" name="description_ru" class="form-control" id="description_ru" placeholder="Описание" value="{{ $news->description_ru }}">
                                        </div>
                                        @error('description_ru')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="content">Контент</label>
                                            <textarea name="content_ru" class="form-control" id="сontent2" placeholder="Контент">{{ $news->content_ru }}</textarea>
                                        </div>
                                        @error('content_ru')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="wrap-regulations-content">
                                    <input type="radio" name="tab-group" class="tab" id="tab3">
                                    <div class="regulations-content">
                                        <h2>Finnish</h2>

                                        <div class="form-group has-feedback">
                                            <label for="title_fi">Название страницы</label>
                                            <input type="text" name="title_fi" class="form-control" id="title_fi" placeholder="Наименование товара" value="{{ $news->title_fi }}" required>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                        @error('title_fi')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="description_fi">Описание</label>
                                            <input type="text" name="description_fi" class="form-control" id="description_fi" placeholder="Описание" value="{{ $news->description_fi }}">
                                        </div>
                                        @error('description_fi')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="content">Контент</label>
                                            <textarea name="content_fi" class="form-control" id="сontent3" placeholder="Контент">{{ $news->content_fi }}</textarea>
                                        </div>
                                        @error('content_fi')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="wrap-regulations-content">
                                    <input type="radio" name="tab-group" class="tab" id="tab4">
                                    <div class="regulations-content">
                                        <h2>Estonian</h2>

                                        <div class="form-group has-feedback">
                                            <label for="title_fi">Название страницы</label>
                                            <input type="text" name="title_et" class="form-control" id="title_et" placeholder="Наименование товара" value="{{ $news->title_et }}" required>
                                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        </div>
                                        @error('title_et')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="description_et">Описание</label>
                                            <input type="text" name="description_et" class="form-control" id="description_et" placeholder="Описание" value="{{ $news->description_et }}">
                                        </div>
                                        @error('description_et')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="content">Контент</label>
                                            <textarea name="content_et" class="form-control" id="сontent4" placeholder="Контент">{{ $news->content_et }}</textarea>
                                        </div>
                                        @error('content_et')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror


                                    </div>
                                </div>
                            </div>


                        <div class="gallery">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="/images/clubs/{{$news->image}}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/images/clubs/{{$news->image}}); background-repeat: no-repeat" onclick="event.preventDefault()">
                                        <div class="trash-block" data-url="{{$news->image}}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                                    </a>
                                    <input type="hidden" name="photos[]" value="{{$news->image}}">
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
    <script src="{{asset('js/admin/addNewsPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeNewsPhoto.js')}}"></script>

    <script>
        CKEDITOR.replace('сontent2');
        CKEDITOR.replace('сontent3');
        CKEDITOR.replace('сontent4');

    </script>
@endsection



