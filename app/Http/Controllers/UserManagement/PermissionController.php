<?php
namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;
use Toastr;


class PermissionController extends Controller
{
     public function __construct(){
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    // Display a listing of the resource.
    
    public function index()
    {
        $permissions = Permission::get();
        return view('permission.index', compact('permissions'));
    }

    // Show the form for creating a new resource.
    public function create() {
        $permission = new Permission();
        return view('permission.create', compact('permission'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request, Permission $permission) {

        $this->validate($request,[
            'title' => 'required|string|min:3|unique:permissions',
        ]);
        //dd($request->toArray());
        $permission->create([
            'title' => $request->title,
        ]);

        Toastr::success('Data Created Successfully', 'Success', ['positionClass' => 'toast-top-right']);

        return redirect()->route('permissions.index');
    }

    // Display the specified resource.
    public function show($id) {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(Permission $permission) {
        return view('permission.create', compact('permission'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Permission $permission) {

        $this->validate($request,[
            'title' => 'required|string|min:3|unique:permissions,title,'.$permission->id,

        ]);

        $permission->update([
            'title' => $request->title,
        ]);

        Toastr::success('Data Updated Successfully', 'Success', ['positionClass' => 'toast-top-right']);

         return redirect()->route('permissions.index');
    }

    // Remove the specified resource from storage.
    public function destroy(Permission $permission) {
        $permission->delete();

        Toastr::success('Data Deleted Successfully', 'Success', ['positionClass' => 'toast-top-right']);

        return redirect()->route('permissions.index');
    }
}
