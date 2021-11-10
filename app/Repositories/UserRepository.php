<?php


namespace App\Repositories;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Filters\UserFilter;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    private $roleRepository;

    public function __construct(){
        $this->roleRepository = new RoleRepository();
    }

    public function createUser(UserRequest $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $default_role = $this->roleRepository->findRoleByName('User');
        $profile = UserProfile::create([
            'level' => 0,
            'buyed_ticket_current_level' => 0
        ]);
        $user->profile()->associate($profile);
        $user->role()->associate($default_role);
        $user->save();
        return $user;
    }
    public function getAllUsers(Request $request, UserFilter $filter)
    {
        return User::with('role')->where('id', '!=', Auth::id())
            ->filter($filter)
            ->sort($request)
            ->paginate(20);
    }


    public function updateUser(User $user, array $fields)
    {
        $user->fill($fields);
        if(isset($fields['password']) && strlen(trim($fields['password']))>1) {
            $fields['password'] = trim($fields['password']);
            $user->password = Hash::make($fields['password']);
        }
        $user->save();
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function findUser($id){
        return User::find($id);
    }
}
