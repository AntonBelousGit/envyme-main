@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form method="POST"  action="{{route('admin.clubs.store')}}" data-toggle="validator" id="add" enctype="multipart/form-data">
                        @csrf

                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Название страницы</label>
                                <input type="text" name="title" class="form-control" id="name" placeholder="Наименование товара" value="{{old('name')}}" required>
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
                                <label for="price">Цена билета</label>
                                <input type="number" name="price" min="0" value="0" step="0.01" required>
                            </div>
                            @error('price')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
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


