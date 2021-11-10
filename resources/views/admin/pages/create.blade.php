@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form method="POST"  action="{{route('admin.pages.store')}}" data-toggle="validator" id="add" enctype="multipart/form-data">
                        @csrf

                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="name">Название страницы</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Наименование товара" value="{{old('name')}}" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="{{old('description')}}">
                            </div>
                            @error('description')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group has-feedback">
                                <label for="content">Контент</label>
                                <textarea name="content" id="content" cols="80" rows="10">{{old('content')}}</textarea>
                            </div>
                            @error('content')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        {{-- <div class="gallery">
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
                        </div> --}}

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
    <script src="{{asset('js/admin/addProductPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeProductPhoto.js')}}"></script>
@endsection


