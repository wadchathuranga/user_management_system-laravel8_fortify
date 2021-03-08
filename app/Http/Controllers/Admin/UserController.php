<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    //
    public function index()
    {
        if (Gate::denies('logged-in')){
            return abort(404);
        }

        if (Gate::allows('is-admin')){
            return view('admin.users.index', ['users' => User::paginate(5)]);
        }

        return abort(404, 'You do not have the admin privileges!');
    }


    //user create ui display
    public function create()
    {
        return view('admin.users.create', ['roles'=>Role::all()]);
    }


    //user create data handle
    public function store(StoreUserRequest $request)
    {
        //check validate using user request 'app/http/request'
//        $validateDate = $request->validated();
//        $user = User::create($validateDate);

        //using laravel fortify action create users
        $NewUser = new CreateNewUser();
        $user = $NewUser->create($request->only(['name', 'email', 'password', 'password_confirmation']));

//        $user = User::create($request->except(['_token', 'roles']));  //without validation have to use this to create user
        $user->roles()->sync($request->roles);

        //sent password reset link to the user when user creating
        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success', 'You have created the user!');


        return redirect(route('admin.user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    //user update ui display
    public function edit($id)
    {
        return view('admin.users.edit',
            [
                'roles' => Role::all(),
                'user' => User::find($id)
            ]);
    }


    //user update data handle
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!$user){
            $request->session()->flash('error', 'You cannot edit this user!');
            return redirect(route('admin.user.index'));
        }

        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'You have updated the user!');


        return redirect(route('admin.user.index'));
    }


    //user delete
    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('success', 'You have deleted the user!');

        return redirect(route('admin.user.index'));
    }
}
