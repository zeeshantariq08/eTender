<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Permission;
use App\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Toastr;

class UserGroupController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $usergroups = UserGroup::with('submodules','permissions')->get();
        return view("usergroup.index", compact('usergroups'));

    }

    public function show($slug){

        $usergroup = UserGroup::where('slug', $slug)->firstorFail();
        return view("usergroup.show", compact('usergroup'));

    }
    public function create() {

        $permissions = Permission::all()->pluck('title', 'id');

        $usergroup = new UserGroup();

        return view('usergroup.create', compact('usergroup','permissions'));
    }


    public function store(Request $request){
        $this->validate($request,[
            'name' => 'bail|required|string|unique:user_groups',
            'description' =>'bail|string|nullable',
            'permissions' =>'required',
        ]);

        $usergroup = new UserGroup;
        $usergroup->name = $request->name;
        $usergroup->description = $request->description;
        $usergroup->slug = Str::slug($request->name,'-');

        $usergroup->save();

        $usergroup->permissions()->sync($request->input('permissions', []));
        
        Toastr::success('User Group added Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->back();
    }
    public function edit($slug)
    {
        $usergroup =  UserGroup::where('slug',$slug)->first();

        $permissions = Permission::all()->pluck('title', 'id');

        return view('usergroup.create', compact('usergroup','permissions'));

    }
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'name' => 'bail|required|string',
            'description' =>'bail|nullable|string'
        ]);
        $usergroup = UserGroup::where('slug',$slug)->first();

        $usergroup->name = $request->name;
        $usergroup->description = $request->description;
        $usergroup->save();

        $usergroup->permissions()->sync($request->input('permissions', []));

        Toastr::success('User Group updated Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('usergroups.index');
    }

    public function toggleStatus($id)
    {
        $usergroup = UserGroup::find($id);
        if($usergroup->status){
            $usergroup->status = 0;
        } else {
            $usergroup->status = 1;
        }
        $usergroup->save();
        return redirect()->back();
    }

    public function destroy($id){

        $usergroup = UserGroup::find($id);

        $usergroup->Users()->delete();
        $usergroup->delete();

        Session::flash('notify', ['type'=>'success','message' => 'Data Deleted successfully']);
        return redirect()->route('usergroup.index');
    }
}
