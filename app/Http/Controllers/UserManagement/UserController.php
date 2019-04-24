<?php

namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;
use Hash;
use Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return response()->json($users, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('laxyo123');
        $user->save();

        $users = User::latest()->get();
        return response()->json($users, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $permissions = $user->getPermissionNames();
        $roles = $user->getRoleNames();
        return response()->json([
            'user' => $user,
            'permissions' => $permissions,
            'roles' => $roles,
            'code' => 200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $users = User::latest()->get();
        return response()->json($users, 200);
    }

    public function assignPermissions(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (count($request->permissions) > 0) {
            $user->syncPermissions($request->permissions);
        } else {
            $user->revokePermissionTo(Permission::all());
        }
        $user->update();
    }

    public function assignRoles(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (count($request->roles) > 0) {
            $user->syncRoles($request->roles);
        } else {
            $user->revokeRoleTo(Role::all());
        }
        $user->update();
    }
}
