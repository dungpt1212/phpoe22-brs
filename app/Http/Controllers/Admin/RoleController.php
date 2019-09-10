<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:manage-roles');
    }
    public function index()
    {
        $roles = Role::with('perms')->get();

        return view('admin.role.list-roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.role.form-create-role', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::firstOrCreate([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);

        foreach($request->get('permission') as $permission){
            $role->attachPermission($permission);
        }

        return redirect(route('role.index'))->with('status', trans('admin.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role)
    {
        $role = Role::findOrFail($role);
        $permissions = Permission::all();
        $role_permissions = $role->perms()->pluck('id')->toArray();

        return view('admin.role.form-update-role', compact('role', 'permissions', 'role_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        $role = Role::findOrFail($role);
        $role->name = $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->description = $request->get('description');
        $role->save();

        $role->perms()->sync([]);

        foreach($request->get('permission') as $permission){
            $role->attachPermission($permission);
        }

        return redirect(route('role.index'))->with('status', trans('admin.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        $role = Role::findOrFail($role);
        $role -> delete();
        $role->users()->sync([]);
        $role->perms()->sync([]);

        return redirect()->back()->with('status', trans('admin.delete_success'));
    }
}
