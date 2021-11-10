@extends('admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form method="POST"  action="{{route('admin.faqs.store')}}" data-toggle="validator" id="add" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="buy_rule">How to buy a ticket</label>
                                <textarea name="buy_rule" class="form-control" id="buy_rule">
                                    {{old('buy_rule')}}
                                </textarea>
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="member_rule">How to become a member of the envyme club</label>
                                <textarea name="member_rule" class="form-control" id="member_rule">
                                    {{old('member_rule')}}
                                </textarea>
                            </div>
                            @error('member_rule')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="vip_rule">What does VIP entry mean</label>
                                <textarea name="vip_rule" class="form-control" id="vip_rule">
                                    {{old('vip_rule')}}
                                </textarea>
                            </div>
                            @error('vip_rule')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="increase_bonus_rule">How can I increase my bonus status</label>
                                <textarea name="increase_bonus_rule" class="form-control" id="increase_bonus_rule">
                                    {{old('increase_bonus_rule')}}
                                </textarea>
                            </div>
                            @error('increase_bonus_rule')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="male_striptease_rule">Can you order a male striptease</label>
                                <textarea name="male_striptease_rule" class="form-control" id="male_striptease_rule">
                                    {{old('male_striptease_rule')}}
                                </textarea>
                            </div>
                            @error('male_striptease_rule')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="multiple_tickets_rule">Can I buy multiple tickets for friends from one account</label>
                                <textarea name="multiple_tickets_rule" class="form-control" id="multiple_tickets_rule">
                                    {{old('multiple_tickets_rule')}}
                                </textarea>
                            </div>
                            @error('multiple_tickets_rule')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group">
                                <label for="support_rule">How can I get support</label>
                                <textarea name="support_rule" class="form-control" id="support_rule">
                                    {{old('support_rule')}}
                                </textarea>
                            </div>
                            @error('support_rule')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <button class="btn btn-success" type="submit">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@endsection
@section('script')
  <script>
      // CKEDITOR.replace('buy_rule');
      CKEDITOR.replace('member_rule');
      CKEDITOR.replace('vip_rule');
      CKEDITOR.replace('increase_bonus_rule');
      CKEDITOR.replace('multiple_tickets_rule');
      CKEDITOR.replace('male_striptease_rule');
      CKEDITOR.replace('support_rule');
  </script>
@endsection


