<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\Province;
use App\Tender;
use App\TenderCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Toastr;

class TenderController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    public function index()
    {
        // $tenders = Tender::withCount(['bids'])->with('bids')->get();
        // dd($tenders->toArray());
        $tenders = Tender::with('tenderCategories')->get();
        // dd($tenders->toArray());
        return view('tender.index',compact('tenders'));
    }

    public function create()
    {
        $districts = District::get();
        $provinces = Province::with('districts')->get();
        // dd($districts->toArray());
        $tender = new Tender();
        $tenderCategory = TenderCategory::get(['id','title']);
        //dd($tenderCategory->toArray());
        return view('tender.create', compact('tender','tenderCategory', 'provinces','districts'));
    }


   public function store(Request $request, Tender $tender)
    {
        //dd($request->toArray());
        
        $this->validate($request, [
            'reference_no' => 'bail|required|string|unique:tenders',
            'title' => 'bail|required|string',
            'open_date' => 'bail|required|date|before:close_date',
            'close_date' => 'bail|required|date|after:open_date',
            'description' => 'bail|required|string',
            'tender_category_id' => 'bail|required|integer',
            'district_id' => 'bail|required|integer',
            'province_id' => 'bail|required|integer',
            'upload_file' => 'bail|required|file|mimes:pdf,doc,ppt,xls,docx,pptx,xlsx|max:8192', //8mb
            'company_ntn' => 'bail|required|string|unique:tenders',
            'company_name' => 'bail|required|string',
            'company_email' =>'bail|required|email',
            'company_phone_no' => 'bail|required',
            'company_address' => 'bail|required'
        ]);

        //dd($request->toArray());

        $userId = \Auth::user()->id;
        $filenametostore = '';

        if(request()->hasFile('upload_file')){
            $sizeInBytes = $request->file('upload_file')->getSize();
            $filenamewithextension = $request->file('upload_file')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $filename = rand(000,999).'_'.uniqid();
            $extension = $request->file('upload_file')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'.'.$extension;

            $path = Storage::disk('local')->put($filenametostore, fopen($request->file('upload_file'), 'r+'));
            dd($path);
        }

        $tender->create([
            'reference_no' => $request->reference_no,
            'title' => $request->title,
            'open_date' => $request->open_date,
            'close_date' => $request->close_date,
            'description' => $request->description,
            'tender_category_id' => $request->tender_category_id,
            'district_id' => $request->district_id,
            'province_id' => $request->province_id,
            'upload_file' => $filenametostore,
            'extension' => $extension,
            'company_ntn' => $request->company_ntn,
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'company_phone_no' => $request->company_phone_no,
            'company_address' => $request->company_address,
            'user_id' => $userId

        ]);

        Toastr::success('Data Created Successfully', 'Success', ['positionClass' => 'toast-top-right']);

        if($request->has('from_tender')){
            return redirect()->route('tenders');
        }else{
            return redirect()->route('tenders.index');
        }

    }


    public function show($id) {

        $tender = Tender::with('tenderCategories','user')->findOrFail($id);
        return view('tender.tender-detail', compact('tender'));
    }


    public function edit(Tender $tender)
    {
        $provinces = Province::with('districts')->get();
        $tenderCategory = TenderCategory::get(['id','title']);

        return view('tender.create', compact('tender','tenderCategory', 'provinces'));
    }

    // Update the specified resource in table.

    public function update(Request $request, Tender $tender)
    {
        $this->validate($request, [
            'reference_no' => 'bail|string|required|unique:tenders,reference_no,'.$tender->id,
            'title' => 'bail|required|string',
            'open_date' => 'bail|required|date|before:close_date',
            'close_date' => 'bail|required|date|after:open_date',
            'description' => 'bail|required|string',
            'tender_category_id' => 'bail|required|integer',
            'district_id' => 'bail|required|integer',
            'province_id' => 'bail|required|integer',
            'upload_file' => 'bail|required|file|mimes:pdf,doc,ppt,xls,docx,pptx,xlsx|max:8192' //8mb
        ]);

        //dd($request->toArray());

        $userId = \Auth::user()->id;
        $filenametostore = '';

        if(request()->hasFile('upload_file')){
            $sizeInBytes = $request->file('upload_file')->getSize();
            $filenamewithextension = $request->file('upload_file')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $filename = rand(000,999).'_'.uniqid();
            $extension = $request->file('upload_file')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $filename.'.'.$extension;

            $path = Storage::disk('local')->put($filenametostore, fopen($request->file('upload_file'), 'r+'));
        }

        $tender->update([
            'reference_no' => $request->reference_no,
            'title' => $request->title,
            'open_date' => $request->open_date,
            'close_date' => $request->close_date,
            'description' => $request->description,
            'tender_category_id' => $request->tender_category_id,
            'district_id' => $request->district_id,
            'province_id' => $request->province_id,
            'upload_file' => $filenametostore,
            'extension' => $extension,
            'user_id' => $userId

        ]);

        Toastr::success('Data Updated Successfully', 'Success', ['positionClass' => 'toast-top-right']);

        return redirect()->route('tenders.index');
        
    }

    public function destroy(Tender $tender)
    {
        //dd($tender);
        $exists = Storage::disk('local')->exists($tender->upload_file);
        if($exists) {
            unlink('.'.Storage::url($tender->upload_file));
        }

        $tender->delete();

        Toastr::success('Data Deleted Successfully', 'Danger', ['positionClass' => 'toast-top-right']);

        return redirect()->route('tenders.index');
    }

    //update Tender Status
    public function tenderStatus($id)
    {
        $tender = Tender::find($id);
        //dd($tender);
        if($tender->status){
            $tender->status = 0;

            //dd($tender->status);
        } else {
            $tender->status = 1;
        }
        $tender->update();

        Toastr::success('Status Updated Successfully', 'Success', ['positionClass' => 'toast-top-right']);

        return redirect()->back();
    }

    public function get_by_province(Request $request)
    {

        if (!$request->province_id) {
            $html = '<option value=""> Please Select </option>';
        } else {
            $html = '';
            $districts = District::where('province_id', $request->province_id)->get();
            foreach ($districts as $district) {
                $html .= '<option value="'.$district->id.'">'.$district->name.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }


}
