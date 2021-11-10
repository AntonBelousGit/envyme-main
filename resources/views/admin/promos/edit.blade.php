@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('admin.promo.update', $promo)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="name">Название промокода</label>
                                <input type="text" name="discountCode" class="form-control" id="name" placeholder="Наименование товара" value="{{ $promo->discountCode }}" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group">
                                <label for="description">Процент</label>
                                <input type="number"  name="discountPercent" min="0" max="99.99" step="0.01" class="form-control" id="description" placeholder="Описание" value="{{ $promo->discountPercent }}">
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="user_id" value="0">
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
