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
                    <form method="POST"  action="{{route('admin.news.store')}}" data-toggle="validator" id="add" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

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
                                        <label for="title">???????????????? ????????????????</label>
                                        <input type="text" name="title" class="form-control" id="name" placeholder="???????????????????????? ????????????" value="{{old('title')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug" placeholder="???????????? ???????? ????????????????????" value="{{old('slug')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror


                                    <div class="form-group">
                                        <label for="description">????????????????</label>
                                        <input type="text" name="description" class="form-control" id="description" placeholder="????????????????" value="{{old('description')}}" required>
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="content">??????????????</label>
                                        <textarea type="text" name="content" class="form-control" id="content" placeholder="??????????????" required>{{old('content')}}</textarea>                            </div>
                                    @error('content')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="date">???????? ????????????????????</label>
                                        <input type="date" id="data" name="date" value="{{old('date')}}">
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
                                        <label for="title">???????????????? ????????????????</label>
                                        <input type="text" name="title_ru" class="form-control" id="name" placeholder="???????????????????????? ????????????" value="{{old('title_ru')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description2">????????????????</label>
                                        <input type="text" name="description_ru" class="form-control" id="description2" placeholder="????????????????" value="{{old('description_ru')}}" required>
                                    </div>
                                    @error('description_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="content2">??????????????</label>
                                        <textarea type="text" name="content_ru" class="form-control" id="??ontent2" placeholder="??????????????" required>{{old('content_ru')}}</textarea>                            </div>
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
                                        <label for="title">???????????????? ????????????????</label>
                                        <input type="text" name="title_fi" class="form-control" id="name" placeholder="???????????????????????? ????????????" value="{{old('title_fi')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description3">????????????????</label>
                                        <input type="text" name="description_fi" class="form-control" id="description3" placeholder="????????????????" value="{{old('description_fi')}}" required>
                                    </div>
                                    @error('description_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="content3">??????????????</label>
                                        <textarea type="text" name="content_fi" class="form-control" id="??ontent3" placeholder="??????????????" required>{{old('content_fi')}}</textarea>                            </div>
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
                                        <label for="title">???????????????? ????????????????</label>
                                        <input type="text" name="title_et" class="form-control" id="name" placeholder="???????????????????????? ????????????" value="{{old('title_et')}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_et')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description4">????????????????</label>
                                        <input type="text" name="description_et" class="form-control" id="description4" placeholder="????????????????" value="{{old('description_et')}}" required>
                                    </div>
                                    @error('description_et')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="??ontent4">??????????????</label>
                                        <textarea type="text" name="content_et" class="form-control" id="??ontent4" placeholder="??????????????" required>{{old('content_et')}}</textarea>                            </div>
                                    @error('content_et')
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
                                            <div class="dark-blue font-12 medium">???????????????? ????????</div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div id="photo-error-message" class="error-message mb-1"></div>
                            <small class="form-text text-muted">??????????????????????. ???? 5???? ????????</small>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">????????????????</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
@section('script')
    <script src="{{asset('js/admin/addNewsPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeNewsPhoto.js')}}"></script>
    <script>
        // CKEDITOR.replace('description');
        // CKEDITOR.replace('description2');
        // CKEDITOR.replace('description3');
        // CKEDITOR.replace('description4');

        CKEDITOR.replace('??ontent2');
        CKEDITOR.replace('??ontent3');
        CKEDITOR.replace('??ontent4');

    </script>
@endsection


