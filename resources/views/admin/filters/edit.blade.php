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
                    <form action="{{route('admin.filters.update', $filter)}}" method="POST">
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
                                        <label for="title">Название фильтра</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Наименование фильтра" value="{{ $filter->title }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <label for="type">Тип фильтра</label>
                                        <input type="text" name="type" class="form-control" id="type" placeholder="Тип фильтра" value="{{ $filter->type }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('type')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror

                                    @if($filter->type !== 'country' && $filter->type !== 'feature')
                                        <div class="form-group has-feedback">
                                            <label for="city">Cтрана</label>
                                            {{--                                {{dd($filter)}}--}}

                                            <select name="filter_id" id="city" class="form-control" required>

                                                @foreach($countrys as $country)
                                                    <option value="{{$country->id}}" @if($country->id == $filter->filter_id) selected @endif>

                                                        {{$country->title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <input type="hidden" name="filter_id" value="null">
                                    @endif
                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab2">
                                <div class="regulations-content">
                                    <h2>Russian</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Название фильтра</label>
                                        <input type="text" name="title_ru" class="form-control" id="title" placeholder="Наименование фильтра" value="{{ $filter->title_ru }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab3">
                                <div class="regulations-content">
                                    <h2>Finnish</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Название фильтра</label>
                                        <input type="text" name="title_fi" class="form-control" id="title" placeholder="Наименование фильтра" value="{{ $filter->title_fi }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab4">
                                <div class="regulations-content">
                                    <h2>Estonian</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Название фильтра</label>
                                        <input type="text" name="title_et" class="form-control" id="title" placeholder="Наименование фильтра" value="{{ $filter->title_et }}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

{{--                        <div class="box-body">--}}
{{--                            <div class="form-group has-feedback">--}}
{{--                                <label for="title">Название фильтра</label>--}}
{{--                                <input type="text" name="title" class="form-control" id="title" placeholder="Наименование фильтра" value="{{ $filter->title }}" required>--}}
{{--                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>--}}
{{--                            </div>--}}
{{--                            @error('title')--}}
{{--                                <div class="alert alert-danger">{{$message}}</div>--}}
{{--                            @enderror--}}
{{--                            <div class="form-group has-feedback">--}}
{{--                                <label for="type">Тип фильтра</label>--}}
{{--                                <input type="text" name="type" class="form-control" id="type" placeholder="Тип фильтра" value="{{ $filter->type }}" required>--}}
{{--                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>--}}
{{--                            </div>--}}
{{--                            @error('type')--}}
{{--                                <div class="alert alert-danger">{{$message}}</div>--}}
{{--                            @enderror--}}

{{--                            @if($filter->type !== 'country')--}}
{{--                            <div class="form-group has-feedback">--}}
{{--                                <label for="city">Cтрана</label>--}}
{{--                                {{dd($filter)}}--}}

{{--                                <select name="filter_id" id="city" class="form-control" required>--}}

{{--                                    @foreach($countrys as $country)--}}
{{--                                        <option value="{{$country->id}}" @if($country->id == $filter->filter_id) selected @endif>--}}

{{--                                            {{$country->title}}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            @else--}}
{{--                                <input type="hidden" name="filter_id" value="null">--}}
{{--                            @endif--}}
{{--                        </div>--}}

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection



