
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
                <form action="{{route('admin.memberships.update', $membership)}}" enctype="multipart/form-data" method="POST">
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
{{--                            {{dd($membership)}}--}}

                                    <div class="tabs-content">
                                        <div class="wrap-regulations-content">
                                            <input type="radio" name="tab-group" class="tab" id="tab1" checked="">
                                            <div class="regulations-content">
                                                <h2>English</h2>
                                                <label for="description">Описание</label>
                                                <textarea name="description" id="description" cols="30" rows="10">{{$membership->description}}</textarea>

                                                <label for="bonus_description">Описание карты бонус</label>
                                                <textarea name="bonus_description" id="bonus_description" cols="30" rows="10">{{$membership->bonus_description}}</textarea>

                                                <label for="silver_description">Описание карты сильвер</label>
                                                <textarea name="silver_description" id="silver_description" cols="30" rows="10">{{$membership->silver_description}}</textarea>

                                                <label for="gold_description">Описание карты голд</label>
                                                <textarea name="gold_description" id="gold_description" cols="30" rows="10">{{$membership->gold_description}}</textarea>

                                                <label for="gold_description">Описание карты бриллиант</label>
                                                <textarea name="diamond_description" id="diamond_description" cols="30" rows="10">{{$membership->diamond_description}}</textarea>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Bonus</th>
                                                            <th>Silver</th>
                                                            <th>Gold</th>
                                                            <th>Diamond</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($membership->data as $key => $value)
                                                            <tr>
                                                                <td><input type="text" name="{{$key}}[]" value="{{$key}}"></td>
                                                                <td><input type="checkbox" name="{{$key}}[]" @if($value[0]) checked value="on" @else value="off" @endif></td>
                                                                <td><input type="checkbox" name="{{$key}}[]" @if($value[1]) value="on" checked @else value="off" @endif></td>
                                                                <td><input type="checkbox" name="{{$key}}[]" @if($value[2]) value="on" checked @else value="off" @endif></td>
                                                                <td><input type="checkbox" name="{{$key}}[]" @if($value[3]) value="on" checked @else value="off" @endif></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrap-regulations-content">
                                            <input type="radio" name="tab-group" class="tab" id="tab2">
                                            <div class="regulations-content">
                                                <h2>Russian</h2>
                                                <label for="description">Описание</label>
                                                <textarea name="description_ru" id="description_ru" cols="30" rows="10">{{$membership->description_ru}}</textarea>

                                                <label for="bonus_description">Описание карты бонус</label>
                                                <textarea name="bonus_description_ru" id="bonus_description_ru" cols="30" rows="10">{{$membership->bonus_description_ru}}</textarea>

                                                <label for="silver_description">Описание карты сильвер</label>
                                                <textarea name="silver_description_ru" id="silver_description_ru" cols="30" rows="10">{{$membership->silver_description_ru}}</textarea>

                                                <label for="gold_description">Описание карты голд</label>
                                                <textarea name="gold_description_ru" id="gold_description_ru" cols="30" rows="10">{{$membership->gold_description_ru}}</textarea>

                                                <label for="gold_description">Описание карты бриллиант</label>
                                                <textarea name="diamond_description_ru" id="diamond_description_ru" cols="30" rows="10">{{$membership->diamond_description_ru}}</textarea>

                                                <label for="gold_description">Таблица</label>
                                                <input type="text" name="data_ru" class="form-control" value="{{$membership->data_ru}}" required>


                                            </div>
                                        </div>
                                        <div class="wrap-regulations-content">
                                            <input type="radio" name="tab-group" class="tab" id="tab3">
                                            <div class="regulations-content">
                                                <h2>Finnish</h2>
                                                <label for="description">Описание</label>
                                                <textarea name="description_fi" id="description_fi" cols="30" rows="10">{{$membership->description_fi}}</textarea>

                                                <label for="bonus_description">Описание карты бонус</label>
                                                <textarea name="bonus_description_fi" id="bonus_description_fi" cols="30" rows="10">{{$membership->bonus_description_fi}}</textarea>

                                                <label for="silver_description">Описание карты сильвер</label>
                                                <textarea name="silver_description_fi" id="silver_description_fi" cols="30" rows="10">{{$membership->silver_description_fi}}</textarea>

                                                <label for="gold_description">Описание карты голд</label>
                                                <textarea name="gold_description_fi" id="gold_description_fi" cols="30" rows="10">{{$membership->gold_description_fi}}</textarea>

                                                <label for="gold_description">Описание карты бриллиант</label>
                                                <textarea name="diamond_description_fi" id="diamond_description_fi" cols="30" rows="10">{{$membership->diamond_description_fi}}</textarea>
                                                <label for="gold_description">Таблица</label>

                                                <input type="text" name="data_fi" class="form-control" value="{{$membership->data_fi}}" required>

                                            </div>
                                        </div>
                                        <div class="wrap-regulations-content">
                                            <input type="radio" name="tab-group" class="tab" id="tab4">
                                            <div class="regulations-content">
                                                <h2>Estonian</h2>
                                                <label for="description">Описание</label>
                                                <textarea name="description_et" id="description_et" cols="30" rows="10">{{$membership->description_et}}</textarea>

                                                <label for="bonus_description">Описание карты бонус</label>
                                                <textarea name="bonus_description_et" id="bonus_description_et" cols="30" rows="10">{{$membership->bonus_description_et}}</textarea>

                                                <label for="silver_description">Описание карты сильвер</label>
                                                <textarea name="silver_description_et" id="silver_description_et" cols="30" rows="10">{{$membership->silver_description_et}}</textarea>

                                                <label for="gold_description">Описание карты голд</label>
                                                <textarea name="gold_description_et" id="gold_description_et" cols="30" rows="10">{{$membership->gold_description_et}}</textarea>

                                                <label for="gold_description">Описание карты бриллиант</label>
                                                <textarea name="diamond_description_et" id="diamond_description_et" cols="30" rows="10">{{$membership->diamond_description_et}}</textarea>
                                                <label for="gold_description">Таблица</label>

                                                <input type="text" name="data_et" class="form-control" value="{{$membership->data_et}}" required>

                                            </div>
                                        </div>
                                    </div>


                    <div class="box">
                        <div class="box-body">

{{--                            <div class="gallery">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <a href="/images/clubs/{{$membership->image}}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/images/clubs/{{$membership->image}}); background-repeat: no-repeat" onclick="event.preventDefault()">--}}
{{--                                            <div class="trash-block" data-url="{{$membership->image}}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>--}}
{{--                                        </a>--}}
{{--                                        <input type="hidden" name="image" value="{{$membership->image}}">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <label for="addPhotoInput" class="add-photo">--}}
{{--                                            <input type="file" name="file" id="addPhotoInput" class="input-file-hidden">--}}
{{--                                            <div class="add-photo-title text-center">--}}
{{--                                                <img src="{{asset('img/plus.svg')}}" style="width: 20px;">--}}
{{--                                                <div class="dark-blue font-12 medium">Добавить фото</div>--}}
{{--                                            </div>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div id="photo-error-message" class="error-message mb-1"></div>--}}
{{--                                <small class="form-text text-muted">Изображения. До 5мб файл</small>--}}
{{--                            </div>--}}




{{--                            <label for="description">Описание</label>--}}
{{--                            <textarea name="description" id="description" cols="30" rows="10">{{$membership->description}}</textarea>--}}

{{--                            <label for="bonus_description">Описание карты бонус</label>--}}
{{--                            <textarea name="bonus_description" id="bonus_description" cols="30" rows="10">{{$membership->bonus_description}}</textarea>--}}

{{--                            <label for="silver_description">Описание карты сильвер</label>--}}
{{--                            <textarea name="silver_description" id="silver_description" cols="30" rows="10">{{$membership->silver_description}}</textarea>--}}

{{--                            <label for="gold_description">Описание карты голд</label>--}}
{{--                            <textarea name="gold_description" id="gold_description" cols="30" rows="10">{{$membership->gold_description}}</textarea>--}}

{{--                            <label for="gold_description">Описание карты бриллиант</label>--}}
{{--                            <textarea name="diamond_description" id="diamond_description" cols="30" rows="10">{{$membership->diamond_description}}</textarea>--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-bordered table-hover">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Name</th>--}}
{{--                                        <th>Bonus</th>--}}
{{--                                        <th>Silver</th>--}}
{{--                                        <th>Gold</th>--}}
{{--                                        <th>Diamond</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach($membership->data as $key => $value)--}}
{{--                                        <tr>--}}
{{--                                            <td><input type="text" name="{{$key}}[]" value="{{$key}}"></td>--}}
{{--                                            <td><input type="checkbox" name="{{$key}}[]" @if($value[0]) checked value="on" @else value="off" @endif></td>--}}
{{--                                            <td><input type="checkbox" name="{{$key}}[]" @if($value[1]) value="on" checked @else value="off" @endif></td>--}}
{{--                                            <td><input type="checkbox" name="{{$key}}[]" @if($value[2]) value="on" checked @else value="off" @endif></td>--}}
{{--                                            <td><input type="checkbox" name="{{$key}}[]" @if($value[3]) value="on" checked @else value="off" @endif></td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}

                            <div class="gallery">
                                <div class="row">
{{--                                        {{dd(json_decode($membership->photos))}}--}}
{{--                                    @if(count($membership->photos) > 0)--}}
                                        @foreach(json_decode($membership->photos) as $image)
                                            <div class="col-md-3">
                                                <a href="/images/clubs/{{$image}}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/images/clubs/{{$image}}); background-repeat: no-repeat" onclick="event.preventDefault()">
                                                    <div class="trash-block" data-url="{{$image}}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                                                </a>
                                                <input type="hidden" name="gallery[]" value="{{$image}}">
                                            </div>
                                        @endforeach
{{--                                    @endif--}}
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
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection
@section('script')
    <script src="{{asset('js/admin/addMembershipPhoto.js')}}"></script>
    <script src="{{asset('js/admin/removeMembershipPhoto.js')}}"></script>
{{--    <script src="{{asset('js/admin/addClubPhoto.js')}}"></script>--}}
{{--    <script src="{{asset('js/admin/removeClubPhoto.js')}}"></script>--}}

    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('bonus_description');
        CKEDITOR.replace('silver_description');
        CKEDITOR.replace('gold_description');
        CKEDITOR.replace('diamond_description');
        CKEDITOR.replace('description_ru');
        CKEDITOR.replace('bonus_description_ru');
        CKEDITOR.replace('silver_description_ru');
        CKEDITOR.replace('gold_description_ru');
        CKEDITOR.replace('diamond_description_ru');
        CKEDITOR.replace('description_fi');
        CKEDITOR.replace('bonus_description_fi');
        CKEDITOR.replace('silver_description_fi');
        CKEDITOR.replace('gold_description_fi');
        CKEDITOR.replace('diamond_description_fi');
        CKEDITOR.replace('description_et');
        CKEDITOR.replace('bonus_description_et');
        CKEDITOR.replace('silver_description_et');
        CKEDITOR.replace('gold_description_et');
        CKEDITOR.replace('diamond_description_et');
        $(function(){
            $('input:checkbox').on('click', function(){
                $value = null;
                if($(this).is(':checked')){
                    $value = 'on';
                    $(this).attr('checked', true);
                } else {
                    $value = 'off';
                    $(this).removeAttr('checked');
                }
                $(this).attr('value', $value);
            })

            $('form').on('submit', function(){
                $('input:checkbox').prop('checked', true);
            })
        });
    </script>
@endsection
