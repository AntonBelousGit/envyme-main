<?php

namespace App\Repositories\Interfaces;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Filters\UserFilter;
use App\Models\User;

interface UserRepositoryInterface
{
    public function createUser(UserRequest $request);
    public function getAllUsers(Request $request, UserFilter $filter);
    public function updateUser(User $user, array $fields);
    public function deleteUser(User $user);
    public function findUser($id);
}
