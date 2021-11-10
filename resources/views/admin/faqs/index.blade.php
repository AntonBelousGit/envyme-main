
@extends('admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="card">
                        <div class="card-header">
                            Форма
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.faqs.index')}}" method="GET">
                                <div class="form-group">
                                    <label for="name">Название статьи</label>
                                    <input type="text" class="form-control" name="name" placeholder="Введите название статьи">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit">Искать</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>How to buy a ticket?</th>
                                <th>How to become a member of the envyme club?</th>
                                <th>What does VIP entry mean?</th>
                                <th>How can I increase my bonus status?</th>
                                <th>Can you order a male striptease?</th>
                                <th>Can I buy multiple tickets for friends from one account</th>
                                <th>How can I get support?</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faqs as $faq)
                            <tr>
                                <td>{{$faq->id}}</td>
                                <td>{{mb_substr($faq->buy_rule, 0, 20) . '...'}}</td>
                                <td>{{mb_substr($faq->member_rule, 0, 20) . '...'}}</td>
                                <td>{{mb_substr($faq->vip_rule, 0, 20) . '...'}}</td>
                                <td>{{mb_substr($faq->increase_bonus_rule, 0, 20) . '...'}}</td>
                                <td>{{mb_substr($faq->male_striptease_rule, 0, 20) . '...'}}</td>
                                <td>{{mb_substr($faq->multiple_tickets_rule, 0, 20) . '...'}}</td>
                                <td>{{mb_substr($faq->support_rule, 0, 20) . '...'}}</td>
                                <td>
                                    <form action="{{route('admin.faqs.destroy', $faq)}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="c-icon cil-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('admin.faqs.edit', $faq)}}" class="btn btn-outline-success btn-sm">
                                        <i class="c-icon cil-pencil"></i>
                                    </a>
                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->

    @endsection
