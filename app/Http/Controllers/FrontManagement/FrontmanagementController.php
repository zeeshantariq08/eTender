<?php

namespace App\Http\Controllers\FrontManagement;

use App\Http\Controllers\Controller;
use App\Tender;
use Illuminate\Http\Request;

class FrontmanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function getTenders(Request $request)
    {
        //dd($request->toArray());

        $tenders = Tender::where('tender_category_id', '=', $request->tender_category_id)
            ->orWhere(function ($query) use ($request) {
                $query->where('province_id', '=', $request->province_id);
                      // ->orWhere('district_id', '=', $request->district_id);
            })->orWhere(function ($query) use ($request) {
                $query->where('district_id', '=', $request->district_id);
            })
            ->with('tenderCategories','bids')->orderBy('id','DESC')->get();

            //dd($tenders->toArray());

            //$tenders = Tender::with('tenderCategories')->orderBy('id','DESC')->get();
        return view('main.tenders', compact('tenders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tender_detail($id)
    {
        $tender = Tender::findOrFail($id);
        $bids = $tender->bids()->with('tender')->get();

        //dd($bids->toArray());

        return view('main.tender-detail', compact('tender','bids'));
    }

    public function add_bid($id)
    {
        $tender = Tender::where('status',1)->findOrFail($id);

        //dd($tender->toArray());
        return view('main.post-bid', compact('tender'));
    }

    //create-bid.blade.php

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
