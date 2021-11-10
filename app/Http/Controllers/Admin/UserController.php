<?php

namespace App\Http\Controllers\Admin;

use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Service\Users\Handlers\UserHandler;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userHandler;
    private $roleRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
       $this->userHandler = new UserHandler($userRepository);
       $this->roleRepository = new RoleRepository();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserFilter $filter)
    {
        $users = $this->userHandler->getAllUsers($request, $filter);
        $roles = $this->roleRepository->getAllRoles();
        return view('admin.users.index', compact('users', 'roles'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = $this->roleRepository->getAllRoles();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
//        dd($request);

        if(isset($request->password)){
        $validated_data =  $this->validate($request, [
            '_token'=>'required',
            '_method'=>'required',
            'name' => 'required|string',
            'surname' => 'required|string',
            'nickname' => 'required|string',
            'email' => 'required|string',
            'country' => 'required|string',
            'birthday' => 'required|date',
            'phone' => 'required|string',
            'role_id' => 'required',
            'password'=>'string',
        ]);}
        else{
        $validated_data =  $this->validate($request, [
            '_token'=>'required',
            '_method'=>'required',
            'name' => 'required|string',
            'surname' => 'required|string',
            'nickname' => 'required|string',
            'email' => 'required|string',
            'country' => 'required|string',
            'birthday' => 'required|date',
            'phone' => 'required|string',
            'role_id' => 'required',
            ]);
        }

//        dd($validated_data);
//        $validated_data = $request->validated();
        if(Auth::user()->can('update', $user)) {

            $this->userHandler->updateUser($user, $validated_data);

            return redirect()->route('admin.users.index')->with('status', 'Вы успешно изменили пользователя');
        } else {
            return redirect()->back();
        }
    }

    public function update2(UserRequest $request, User $user)
    {
        if(isset($request->password)){
            $validated_data =  $this->validate($request, [
                '_token'=>'required',
                '_method'=>'required',
                'name' => 'required|string',
                'nickname' => 'required|string',
                'email' => 'required|string',
                'country' => 'required|string',
                'birthday' => 'required|date',
                'phone' => 'required|string',
                'password'=>'string',
            ]);
        }else{
            $validated_data =  $this->validate($request, [
                '_token'=>'required',
                '_method'=>'required',
                'name' => 'required|string',
                'nickname' => 'required|string',
                'email' => 'required|string',
                'country' => 'required|string',
                'birthday' => 'required|date',
                'phone' => 'required|string',
            ]);
        }

//          dd($validated_data);
//        $validated_data = $request->validated();
        if(Auth::user()->can('update', $user)) {

//            dd($validated_data);
            $this->userHandler->updateUser($user, $validated_data);

            return redirect()->route('my_account',Auth::id())->with('status', 'Вы успешно изменили cвои данные');
        } else {
            return redirect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->userHandler->deleteUser($user);
        return redirect()->route('admin.users.index')->with('status', 'Вы успешно удалили пользователя');
    }
}
