<?php


namespace App\Service\Users\Handlers;
use App\Filters\UserFilter;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserHandler
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(UserRequest $request)
    {
        return $this->userRepository->createUser($request);
    }

    public function getAllUsers(Request $request, UserFilter $filter)
    {
        return $this->userRepository->getAllUsers($request, $filter);
    }

    public function updateUser(User $user, array $fields)
    {
        return $this->userRepository->updateUser($user, $fields);
    }

    public function deleteUser(User $user)
    {
        return $this->userRepository->deleteUser($user);
    }
}
