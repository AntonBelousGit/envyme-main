@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form method="POST"  action="{{route('admin.social.update', $social)}}">
                        @method('PUT')
                        @csrf

                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="telegram">Название</label>
                                <input type="text" name="title" class="form-control" id="telegram"  value="{{ $social->title }}" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group has-feedback">
                                <label for="facebook">Сылка</label>
                                <input type="text" name="link" class="form-control" id="facebook"  value="{{ $social->link }}" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            @error('link')
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


