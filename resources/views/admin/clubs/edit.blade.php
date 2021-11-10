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
                    <form action="{{route('admin.clubs.update', $club)}}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Наименование товара" value="{{ $club->title }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Наименование товара" value="{{ $club->slug }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="{{ $club->description }}">
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    @foreach($features as $feature)
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="features[]" value="{{$feature->title}}" @if(in_array($feature->id, $club_features)) checked @endif> {{$feature->title}}
                                            </label>
                                        </div>
                                    @endforeach
                                    @php list($from, $to) = explode('-', $club->schedule); @endphp



                                    <div class="form-group has-feedback">
                                        <label for="city">Города</label>
                                        <select multiple name="features[]" id="city" class="form-control" required>
                                            @foreach($cities as $city)
                                                <option value="{{$city->title}}" @if(in_array($city->id, $club_city)) selected @endif>{{$city->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label for="from_time">Время начала работы</label>
                                        <input type="time" id="from_time" name="from_time" value="{{$from}}">
                                    </div>
                                    @error('from_time')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="to_time">Время конца работы</label>
                                        <input type="time" id="to_time" name="to_time" value="{{$to}}">
                                    </div>
                                    @error('to_time')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="map">Аддресс</label>
                                        <input type="text" name="map" class="form-control" value="{{$club->map}}" required>
                                    </div>
                                    @error('map')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="map">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{$club->email}}" required>
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="price">Цена билета</label>
                                        @if(count($club->tickets))
                                            <input type="number" name="price" min="0" value="{{$club->price}}" step="0.01" required>
                                        @else
                                            <input type="number" name="price" min="0" value="0" step="0.01" required>
                                        @endif
                                    </div>

                                    @error('price')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="price">Скидка</label>
                                        <select name="discount" id="city" class="form-control" required>
                                            <option value="0" @if($club->discount == 0) selected @endif>0%</option>
                                            <option value="20"@if($club->discount == 20) selected @endif>-20%</option>
                                            <option value="30"@if($club->discount == 30) selected @endif>-30%</option>
                                            <option value="50"@if($club->discount == 50) selected @endif>-50%</option>
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
                                        <label for="title_ru">Название страницы</label>
                                        <input type="text" name="title_ru" class="form-control" id="title" placeholder="Наименование товара" value="{{ $club->title_ru }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description_ru">Описание</label>
                                        <input type="text" name="description_ru" class="form-control" id="description_ru" placeholder="Описание" value="{{ $club->description_ru }}">
                                    </div>
                                    @error('description_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="map">Аддресс</label>
                                        <input type="text" name="map_ru" class="form-control" value="{{$club->map_ru}}" required>
                                    </div>
                                    @error('map_ru')
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
                                        <input type="text" name="title_fi" class="form-control" id="title_fi" placeholder="Наименование товара" value="{{ $club->title_fi }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description_fi">Описание</label>
                                        <input type="text" name="description_fi" class="form-control" id="description_fi" placeholder="Описание" value="{{ $club->description_fi }}">
                                    </div>
                                    @error('description_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="map">Аддресс</label>
                                        <input type="text" name="map_fi" class="form-control" value="{{$club->map_fi}}" required>
                                    </div>
                                    @error('map_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab4">
                                <div class="regulations-content">
                                    <h2>Estonian</h2>

                                    <div class="form-group has-feedback">
                                        <label for="title_et">Название страницы</label>
                                        <input type="text" name="title_et" class="form-control" id="title_et" placeholder="Наименование товара" value="{{ $club->title_et }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_et')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="description_et">Описание</label>
                                        <input type="text" name="description_et" class="form-control" id="description_et" placeholder="Описание" value="{{ $club->description_et }}">
                                    </div>
                                    @error('description_et')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    <div class="form-group has-feedback">
                                        <label for="map">Аддресс</label>
                                        <input type="text" name="map_et" class="form-control" value="{{$club->map_et}}" required>
                                    </div>
                                    @error('map_et')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror


                                </div>
                            </div>
                        </div>


                        <div class="gallery">
                            <div class="row">
{{--                                {{dd($club->photos)}}--}}
                                @if(count($club->photos) > 0)
                                    @foreach($club->photos as $image)
                                    <div class="col-md-3">
                                        <a href="/images/clubs/{{$image}}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/images/clubs/{{$image}}); background-repeat: no-repeat" onclick="event.preventDefault()">
                                            <div class="trash-block" data-url="{{$image}}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                                        </a>
                                        <input type="hidden" name="gallery[]" value="{{$image}}">
                                    </div>
                                    @endforeach
                                @endif
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
    <script src="{{asset('js/admin/addClubPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeClubPhoto.js')}}"></script>
@endsection



