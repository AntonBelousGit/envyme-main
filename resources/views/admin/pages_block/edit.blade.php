@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('admin.pages.update', $page)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="name">Название страницы</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Наименование товара" value="{{ $page->name }}" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="{{ $page->description }}">
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group has-feedback">
                                <label for="content">Контент</label>
                                <textarea name="cont" id="content" cols="80" rows="10">{{ $page->cont }}</textarea>
                            </div>
                            @error('cont')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="gallery">
                                <div class="row">

                                    <div class="col-md-3">
                                        <a href="/images/products/large/{{$page->image}}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/images/products/middle/{{$page->image}}); background-repeat: no-repeat">
                                            <div class="trash-block" data-url="{{$page->image}}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                                        </a>
                                        <input type="hidden" name="gallery[]" value="${{$page->image}}">
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
    <script src="{{asset('js/admin/addProductPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeProductPhoto.js')}}"></script>
@endsection



