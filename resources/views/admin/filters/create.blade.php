@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form method="POST"  action="{{route('admin.filters.store')}}" data-toggle="validator" id="add">
                        @csrf

                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Название фильтра</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Название фильтра" value="{{old('title')}}" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            @error('title')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group has-feedback">
                                <label for="type">Тип фильтра</label>
{{--                                <input type="text" name="type" class="form-control" id="type" placeholder="Тип фильтра" value="{{old('type')}}" required>--}}
                                <select name="type" id="type" class="form-control" required>
                                    <option value='city'> City </option>
                                        <option value='feature'> Feature </option>
                                        <option value='gender'> Gender </option>
                                        <option value='country'> Country </option>
                                </select>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            @error('type')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group has-feedback">
                                <select name="filter_id" id="parent_id" class="form-control">
                                    <option value='null'>-- Без страны -- </option>
                                    @foreach($countrys as $country)
                                        <option value='{{$country->id}}'>{{$country->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('filter_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
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


