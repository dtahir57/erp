<?php

namespace App\Http\Controllers\UserManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Session;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{

    public function __construct()
    {
        // return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Permission::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.user_management.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $permission = Permission::create($request->all());
        $permissions = Permission::latest()->get();
        return response()->json($permissions, 201);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return response()->json([
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->update();

        $permissions = Permission::latest()->get();
        return response()->json($permissions, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response                                                                                        
     */
    public function destroy($permission)
    {
        $permission = Permission::findOrFail($permission);
        $permission->delete();
        $permissions = Permission::latest()->get();
        return response()->json($permissions, 200);
    }
}
