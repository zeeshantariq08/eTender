<?php

namespace App\Http\Controllers\UserManagement;

use App\User;
use App\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Toastr;
use Session;
use Auth;
class UserController extends Controller
{
    


    public function index()
    {
    	$users = User::with('usergroup')->get();
    	return view('user.index', compact('users'));

    }

    public function store( Request $request){

        $this->validate($request,[
            'name' => 'bail|string|required',
            'email' => 'bail|email|required|unique:users',
            'password' => 'bail|required|string|min:6',
            'contact' => 'bail|required|max:12|string|nullable',
            'user_group_id' => 'bail|required|integer',


        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->contact = $request->contact;
        $user->user_group_id = $request->user_group_id;
        $user->slug = Str::slug($request->name,'-');

        $user->save();

        Toastr::success('User added Successfully', 'Success', ['positionClass' => 'toast-top-right']);

        if($request->has('clent_registration')){
            return redirect()->route('clientLogin');
        }else{
            return redirect()->route('users.index');
        }
    }


    public function create(){
        $user = new User();
        return view('user.create')->with('user',$user)->with('usergroups',UserGroup::all());
    }

    public function show($slug){

        $user = User::where('slug', $slug)->firstorFail();
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user =  User::findorFail($id);

        return view('user.create')->with('user',$user)->with('usergroups',UserGroup::all());

        //return view('usergroup.create')->with('usergroup',$usergroup);
    }
    public function update(Request $request, User $user)
    {

        // $user->name = $request->name;
        
        // dd($user->name);

        $this->validate($request,[
            'name' => 'bail|string|required',
            'email' => 'bail|email|required|unique:users,email,'.$user->id,
            // 'code'     => 'string|required|unique:floors,code,'.$id,
            'contact' => 'bail|required|max:12|string|nullable',
            'user_group_id' => 'bail|required|integer',
        ]);

        //dd($request);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->user_group_id = $request->user_group_id;
        $user->slug = Str::slug($request->name,'-');

        $user->save();
        Toastr::success('User added Successfully', 'Success', ['positionClass' => 'toast-bottom-right']);

        return redirect()->route('users.index');

    }

    public function toggleStatus($id)
    {
        $user = User::find($id);
        if($user->status){
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->save();
        return redirect()->back();
    }

    public function ChangePassword()
    {
        return view('user.password_change');
    }

    public function UpdatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required'],
            'new_password' => ['bail', 'required', 'min:8'],
            'new_confirm_password' => ['bail','required', 'same:new_password'],
        ]);

        if (Hash::check($data['current_password'], auth()->user()->password)){
            User::find(auth()->user()->id)->update(['password'=> Hash::make($data['new_password'])]);
            Toastr::success('Password Changed Successfully', 'Success', ['positionClass' => 'toast-bottom-right']);
            Session::flush ();
            Auth::logout ();
            return Redirect::route('login');
        }else{
            $request->session()->flash('danger', 'Current Password Incorrect');
            return redirect()->back();
        }
        
    }

}
