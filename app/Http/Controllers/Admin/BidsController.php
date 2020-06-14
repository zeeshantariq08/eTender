<?php

namespace App\Http\Controllers\Admin;

use App\Bid;
use App\Http\Controllers\Controller;
use App\Tender;
use App\TenderCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Toastr;
use Illuminate\Support\Facades\Mail;

class BidsController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    //Display a listing of the resource.
    public function index(Tender $tender)
    {
        $bids = $tender->bids()->with('tender')->get();
        //dd($bids->toArray());
        return view('bids.index',compact('tender','bids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tender $tender)
    {
        $bid = new Bid();   
        //dd($tenderCategory->toArray());
        return view('bids.create', compact('tender','bid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tender $tender, Request $request)
    {

        // $encrypted = Crypt::encryptString('Hello world');

        // $decrypted = Crypt::decryptString($encrypted);

        // dd($encrypted. ' '. $decrypted);

        $this->validate($request, [
            'company_name' => 'bail|required|string',
            'ntn_number' => 'bail|required|string|unique:bids',
            'experience' => 'bail|required',
            'amount' => 'bail|required',
            'contact_person' => 'bail|required|string',
            'email' => 'bail|required|email',
            'contact_no' => 'bail|required|numeric|min:11',
           'upload_file' => 'bail|required|file|mimes:pdf,doc,ppt,xls,docx,pptx,xlsx|max:8192' //8mb
        ]);

        //dd($request->toArray());

        if ($tender->bids()->where('ntn_number', $request->ntn_number)->exists()) {

            return Redirect()->back()->with(['company_exist' => 'You Already bid against this tender, Multiple bid against same tender are not allowed...!']);
        }else{

            $userId = \Auth::user()->id;

            if(request()->hasFile('upload_file')){

                $sizeInBytes = request()->file('upload_file')->getSize();
                $filenamewithextension = request()->file('upload_file')->getClientOriginalName();
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                //get file extension
                $filename = rand(000,999).'_'.uniqid();
                $extension = request()->file('upload_file')->getClientOriginalExtension();
                //filename to store
                $filenametostore = $filename.'.'.$extension;

                $path = Storage::disk('local')->put($filenametostore, fopen(request()->file('upload_file'), 'r+'));
            }

            $tender->bids()->create([
                'company_name' => Crypt::encryptString($request->company_name),
                'ntn_number' => $request->ntn_number,
                'experience' => Crypt::encryptString($request->experience),
                'amount' =>     Crypt::encryptString($request->amount),
                'contact_person' => Crypt::encryptString($request->contact_person),
                'email' => Crypt::encryptString($request->email),
                'contact_no' => Crypt::encryptString($request->contact_no),
                'upload_file' => $filenametostore,
                'extension' => $extension,
                'user_id' => $userId

            ]);

            Toastr::success('Data Created Successfully', 'Success', ['positionClass' => 'toast-top-right']);
            if($request->has('from_bider')){

                return redirect()->route('tenders'); 

            }else{
                return redirect()->route('tenders.bids.index',$tender->id); 
            } 
        }
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
    public function edit(Tender $tender, Bid $bid)
    {
        //$bid = new Bid();   
        //dd($bid->toArray());
        return view('bids.create', compact('tender','bid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tender $tender, Bid $bid, Request $request)
    {
        $this->validate($request, [
            'company_name' => 'bail|required|string',
            'company_reg_no' => 'bail|required|string',
            'ntn_number' => 'bail|required|string|unique:bids,ntn_number,'.$bid->id,
            'contact_person' => 'bail|required|string',
            'email' => 'bail|required|email',
            'contact_no' => 'bail|required|string',
            'upload_file.*' => 'bail|required|file|mimes:pdf,doc,ppt,xls,docx,pptx,xlsx|max:8192' //8mb
        ]);
// 'file.*' => 'required|file|max:5000|mimes:pdf,docx,doc',
        //dd($request->toArray());

        $userId = \Auth::user()->id;

        if(request()->hasFile('upload_file')){

            $sizeInBytes = request()->file('upload_file')->getSize();
            $filenamewithextension = request()->file('upload_file')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $filename = rand(000,999).'_'.uniqid();
            $extension = request()->file('upload_file')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'.'.$extension;

            $path = Storage::disk('local')->put($filenametostore, fopen(request()->file('upload_file'), 'r+'));
        }

        //dd($filenametostore);

        $bid->update([
            'company_name' => Crypt::encryptString($request->company_name),
            'ntn_number' => $request->ntn_number,
            'experience' => Crypt::encryptString($request->experience),
            'amount' =>     $request->amount,
            'contact_person' => Crypt::encryptString($request->contact_person),
            'email' => Crypt::encryptString($request->email),
            'contact_no' => Crypt::encryptString($request->contact_no),
            'upload_file' => $filenametostore,
            'extension' => $extension,
            'user_id' => $userId

        ]);

        Toastr::success('Data Updated Successfully', 'Success', ['positionClass' => 'toast-top-right']);

        return redirect()->route('tenders.bids.index',$tender->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tender $tender, Bid $bid)
    {
        $exists = Storage::disk('local')->exists($bid->upload_file);
        if($exists) {
            unlink('.'.Storage::url($tender->upload_file));
        }

        $bid->delete();

        Toastr::success('Data Deleted Successfully', 'Danger', ['positionClass' => 'toast-top-right']);

        return back();
    }


public function toggleStatus($id)
    {
        $bid = Bid::find($id);
         $user = User::where('id',$bid->user_id)->first();
         //dd($user);
        if($bid->status == 'pending'){
            $bid->status = 'approved';
             $email_data = array(
                'name' => $user->name,
                'email' => $user->email,
                
            );


            Mail::send('email', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'])
            ->subject('Approval Of Bid')
            ->from('info@etender.pk', 'etender');
            });

        } else {
            $bid->status = 'pending';
        }
        $bid->save();
        return redirect()->back();
    }

    // public function uploadDocument()
    // {
    //    if(request()->hasFile('upload_file')){
    //         $sizeInBytes = request()->file('upload_file')->getSize();
    //         $filenamewithextension = request()->file('upload_file')->getClientOriginalName();
    //         //get filename without extension
    //         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    //         //get file extension
    //         $filename = rand(000,999).'_'.uniqid();
    //         $extension = request()->file('upload_file')->getClientOriginalExtension();
    //         //filename to store
    //         $filenametostore = $filename.'.'.$extension;

    //         $path = Storage::disk('local')->put($filenametostore, fopen(request()->file('upload_file'), 'r+'));
    //     }

    //     return $filenametostore;
    // }
}
