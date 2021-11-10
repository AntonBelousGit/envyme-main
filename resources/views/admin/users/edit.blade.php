@extends('admin.app')

@section('style')
    <link rel="stylesheet" href="css/admin.css" />
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('admin.users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Имя" value="{{$user->name}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="surname" class="col-sm-2 col-form-label">Фамилия</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Фамилия" value="{{$user->surname}}">
                @error('surname')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="nickname" class="col-sm-2 col-form-label">Никнейм</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Ник" value="{{$user->nickname}}">
                @error('nickname')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$user->email}}">
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="country" class="col-sm-2 col-form-label">Страна</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="country" id="country" placeholder="Страна" value="{{$user->country}}">
                @error('country')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="birthday" class="col-sm-2 col-form-label">День рождения</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="birthday" id="birthday" placeholder="День рождения" value="{{$user->birthday}}">
                @error('birthday')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-sm-2 col-form-label">Телефон</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Телефон" value="{{$user->phone}}">
                @error('birthday')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="roles" class="col-sm-2 col-form-label">Роль</label>
            <div class="col-sm-10">

                <select class="roles" id="role" name="role_id">
                    @php $user_role = $user->role;@endphp
                    @foreach($roles as $role)
                        @if($role->slug !== $user_role))
                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                        @else
                            <option value="{{$role->id}}" >{{$role->name}}</option>
                        @endif
                    @endforeach
                    @error('roles')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </select>

            </div>

        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="password" placeholder="Пароль">
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="password-confirm" class="col-sm-2 col-form-label">Подтверждение пароля</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Подтверджение пароля">
                @error('password_confirmation')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
{{--        <div class="form-group row">--}}
{{--            <label for="avatar" class="col-sm-2 col-form-label">Аватарка</label>--}}
{{--            <div class="col-sm-2">--}}
{{--            @if($user->avatar)--}}
{{--                <img width="100" height="100" src="{{asset('storage/uploads/' . $user->avatar)}}" alt="avatar">--}}
{{--            @else--}}
{{--                <img width="100" height="100" src="{{asset('img/default_avatar.png')}}" alt="avatar">--}}
{{--            @endif--}}
{{--            </div>--}}
{{--            <div class="col-sm-8">--}}
{{--                <input type="file" name="avatar" id="avatar">--}}
{{--                @error('avatar')--}}
{{--                <div class="alert alert-danger">{{$message}}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="form-group row buttons">
            <a href="{{route('admin.users.index')}}" class="btn btn-default">Назад</a>
            <button class="btn btn-warning pull-right">Изменить</button>
        </div>
    </form>
@endsection
