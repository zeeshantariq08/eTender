<?php

namespace App\Http\Controllers\ClientManagement;

use App\Client;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Toastr;
use Session;

class ClientController extends Controller
{

    public function login(Request $request) {
        if (Auth::attempt ( array (
                'email' => $request->get ( 'email' ),
                'password' => $request->get ( 'password' ) 
        ) )) {
            session ( [ 
                    'email' => $request->get ( 'email' ) 
            ] );
            return Redirect::route('main.index');
        } else {
            //Session::flash ( 'message', "" );
            //return Redirect::back ()->with('message', 'Invalid Credentials , Please try again.');
            //return Redirect::back()->withErrors(['message', 'Invalid Credentials , Please try again.']);
            return Redirect::back()->with('error', 'Incorrect username or password.');
        }
    }

    public function logout() {
        Session::flush ();
        Auth::logout ();
        return Redirect::route('main.index');
    }

    public function index()
    {
        return view('client.index')->with('clients',Client::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = new Client();
        return view('client.create')->with('client',$clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
         $this->validate($request,[
            "name" => "string|required",
            "address" => "string|required",
            'email' => 'email|required||unique:clients',
            "phone_no" => 'required|max:12|string'
            


        ]);

        $client = new Client;
        $client->name = $request->name;
        $client->address = $request->address;
        $client->email = $request->email;
        $client->phone_no = $request->phone_no;
        $client->slug = Str::slug($request->name,'-');
        $client->user_id = Auth::id();




        $client->save();
        Toastr::success('Client added Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($slug){

        $client = Client::where('slug', $slug)->firstorFail();
        return view("client.show", compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $client =  Client::where('slug',$slug)->firstOrFail();
        return view('client.create')->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
         $this->validate($request,[
            "name" => "string|required",
            "address" => "string|required",
            'email' => 'email|required||unique:clients',
            "phone_no" => 'required|max:12|string|nullable'
            


        ]);
        $client = Client::where('slug',$slug)->firstOrFail();

        $client->name = $request->name;
        $client->address = $request->address;
        $client->email = $request->email;
        $client->phone_no = $request->phone_no;
        
        $client->slug = Str::slug($request->name,'-');
        $client->user_id = Auth::id();

         $client->save();
        Toastr::success('Client updated Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
