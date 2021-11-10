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
                    <form method="POST"  action="{{route('admin.benefits.update',$membershipPrivilege)}}" data-toggle="validator" id="add" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                                        <label for="title">Название</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Название фильтра" value="{{$membershipPrivilege->title}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group has-feedback">
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="bonus" @if($membershipPrivilege->bonus == 'on') checked @endif> Bonus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="silver" @if($membershipPrivilege->silver == 'on') checked @endif> Silver
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="gold" @if($membershipPrivilege->gold == 'on') checked @endif> Gold
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" name="diamond" @if($membershipPrivilege->diamond == 'on') checked @endif> Diamond
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab2">
                                <div class="regulations-content">
                                    <h2>Russian</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Название</label>
                                        <input type="text" name="title_ru" class="form-control" id="title" placeholder="Название" value="{{$membershipPrivilege->title_ru}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_ru')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab3">
                                <div class="regulations-content">
                                    <h2>Finnish</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Название</label>
                                        <input type="text" name="title_fi" class="form-control" id="title" placeholder="Название фильтра" value="{{$membershipPrivilege->title_fi}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_fi')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="wrap-regulations-content">
                                <input type="radio" name="tab-group" class="tab" id="tab4">
                                <div class="regulations-content">
                                    <h2>Estonian</h2>
                                    <div class="form-group has-feedback">
                                        <label for="title">Название</label>
                                        <input type="text" name="title_et" class="form-control" id="title" placeholder="Название фильтра" value="{{$membershipPrivilege->title_et}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    @error('title_et')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
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



