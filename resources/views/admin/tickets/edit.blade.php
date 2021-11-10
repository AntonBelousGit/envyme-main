@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">

                    <form action="{{route('admin.tickets.update', $ticket->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf


                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="name">Наименование товара</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Наименование товара" value="{{$ticket->name}}" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="title">Категория товара</label>
                                <select name="parent_id" id="parent_id" class="form-control" required>
                                    <option value='null'>-- самостоятельная категория -- </option>

{{--                                    @include('admin.categories.include.edit_categories_all_list',['categories' => $categories, 'delimiter' => $delimiter])--}}

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="{{$ticket->description}}">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="price">Цена</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Цена" pattern="^[0-9.]{1,}$" value="{{$ticket->price}}" required data-error="Допускаются цифры и десятичная точка">
                                <div class="help-block with-errors"></div>
                            </div>


                            <div class="form-group has-feedback">
                                <label for="content">Контент</label>
                                <textarea name="content" id="editor1" cols="80" rows="10">{{$ticket->content}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" {{$ticket->status ? 'checked' : null}}> Статус
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="hit" {{$ticket->hit ? 'checked' : null}}> Хит
                                </label>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="filter">Фильтры продукты</label>
{{--                                {{ Widget::run('filter', ['tpl' => 'widgets.filter', 'filter' => null]) }}--}}
                            </div>

                            <div class="gallery">
                                <div class="row">
{{--                                    @if(count($images) > 0)--}}
{{--                                        @foreach($images as $image)--}}
{{--                                        <div class="col-md-3">--}}
{{--                                            <a href="/images/products/large/{{$image->photo_name}}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/images/products/middle/{{$image->photo_name}}); background-repeat: no-repeat">--}}
{{--                                                <div class="trash-block" data-url="{{$image->photo_name}}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>--}}
{{--                                            </a>--}}
{{--                                            <input type="hidden" name="gallery[]" value="${{$image->photo_name}}">--}}
{{--                                        </div>--}}
{{--                                        @endforeach--}}
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



