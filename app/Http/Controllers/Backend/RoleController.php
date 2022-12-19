<?php

namespace App\Http\Controllers\Backend;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(20);
        return view('backend.roles.index',compact(['roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisssions = Permission::all();
        return view('backend.roles.create',compact(['permisssions']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name' => 'required|unique:roles',
            'label' => 'required',
        ]);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions'));

        Session::flash('add_role','نقش مدیریتی جدید با موفقیت ثبت شد');
        return redirect(route('roles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // return $role;
        $permisssions = Permission::all();
        $checked_permissions = $role->permissions->pluck('id')->toArray();
        return view('backend.roles.edit',compact(['role','permisssions','checked_permissions']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request,[
            'name' => 'required|unique:roles,id,'.$role->id,
            'label' => 'required',
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions'));

        Session::flash('add_role','نقش مدیریتی با موفقیت ویرایش شد');
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
