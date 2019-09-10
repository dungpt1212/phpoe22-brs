<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManageUserRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\Role_User;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:manage-users');
    }

    public function index()
    {
        $id_users_hasrole = Role_User::pluck('user_id');
        $users = User::with('roles')->whereIn('id', $id_users_hasrole)->get();

        return view('admin.user.list-users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.user.form-create-user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageUserRequest $request)
    {
        $emailAreadyExist = User::where('email', $request->get('email'))->count();
        if($emailAreadyExist != 0){
            return redirect()->back()->with('status', trans('admin.email_aready_exist'));
        };

        $user = User::firstOrCreate([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $roles = $request->get('role');
        foreach($roles as $role ){
            Role_User::firstOrCreate([
                'user_id' => $user->id,
                'role_id' => $role,
            ]);
        };

       return redirect(route('user.index'))->with('status', trans('admin.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = User::findOrFail($user);
        $roles = Role::all();
        $role_users = $user->roles()->pluck('id')->toArray();

        return view('admin.user.form-update-user', compact('user', 'roles', 'role_users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManageUserRequest $request, $user)
    {
        $user = User::findOrFail($user);
        $user->name = $request->get('name');
        $user->save();

        $user->roles()->sync([]);
        foreach($request->get('role') as $role){
            $user->attachRole($role);
        }

        return redirect(route('user.index'))->with('status', trans('admin.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::findOrFail($user);
        $user->roles()->sync([]);
        $user->delete();

        return redirect()->back()->with('status', trans('admin.delete_success'));
    }
}
