@extends('admin.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        {{ session('request') }}
    @endif
    <div class="card">
        <div class="card-header">
            Форма
        </div>
        <div class="card-body">
            <form action="{{route('admin.users.index')}}" method="GET">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" name="name" placeholder="Введите имя или email пользователя">
                </div>
                <div class="form-group">
                    <select name="role" id="role">
                        <option value="">{{__('Select role')}}</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{__($role->name)}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success" type="submit">Искать</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-responsive-sm table-hover table-outline mb-0">
        <thead class="thead-light">
        <tr>
            <th class="text-center">
                <svg class="c-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                </svg>
            </th>
            <th class="sorting">@sortablelink('name')</th>
            <th class="text-center">Страна</th>
            <th>Роль</th>
            <th class="text-center">Метод оплаты</th>
            <th>Количество купленных билетов</th>
            <th class="sorting">@sortablelink('created_at')</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)

        <tr>
            <td class="text-center">
                @if($user->avatar)
                    <div class="c-avatar"><img class="c-avatar-img" src="{{asset('storage/uploads/' . $user->avatar)}}" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
                @else
                    <div class="c-avatar"><img class="c-avatar-img" src="{{asset('img/default_avatar.png')}}" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>
                @endif
            </td>
            <td>
                <div>{{$user->name}}</div>
                <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>
            </td>
            <td class="text-center">
                <svg class="c-icon c-icon-xl">
                    <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                </svg>
            </td>
            <td>
                {{$user->role->name}}
            </td>
            <td class="text-center">
                <svg class="c-icon c-icon-xl">
                    <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-mastercard"></use>
                </svg>
            </td>
            <td>
                {{$user->user_profile->buy_count_tickets}}
            </td>
            <td>
                {{ $user->created_at->format('d.m.Y') }}
            </td>
            <td class="action">
                <form action="{{route('admin.users.destroy', $user)}}" class="d-inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        <i class="c-icon cil-trash"></i>
                    </button>
                </form>
                <a href="{{route('admin.users.edit', $user)}}" class="btn btn-outline-success btn-sm">
                    <i class="c-icon cil-pencil"></i>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{$users->links()}}
@endsection
