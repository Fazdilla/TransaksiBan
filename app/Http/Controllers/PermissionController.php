<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:permissions.index|permissions.create|permissions.store', ['only' => ['index', 'create', 'edit', 'delete']]);
    // }
    /**
    * function index
    *
    * @return void
    */
    public function index()
    {
        $permissions = Permission::latest()->get();
        
        return view('permissions.index', compact('permissions'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::latest()->get();
        return view('permissions.create', compact('permissions'));
    }


    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|unique:Permission'
        // ]);

        $Permission = Permission::create([
            'name' => $request->input('name').".index",
            'guard_name' => "web"
        ]);
        $Permission = Permission::create([
            'name' => $request->input('name').".create",
            'guard_name' => "web"
        ]);
        $Permission = Permission::create([
            'name' => $request->input('name').".edit",
            'guard_name' => "web"
        ]);
        $Permission = Permission::create([
            'name' => $request->input('name').".delete",
            'guard_name' => "web"
        ]);

        //assign permission to role
        // $role->syncPermissions($request->input('permissions'));

        if($Permission){
            //redirect dengan pesan sukses
            return redirect()->route('roles.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('roles.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

}