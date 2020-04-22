<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\TenderCategory;
use Illuminate\Http\Request;

class TenderCategoryController extends Controller
{
    
    public function store(Request $request, TenderCategory $tenderCategory)
    {
    	$this->validate($request, [
            'title' => 'bail|required|string'
        ]);

        $tenderCategory->create($request->only('title'));
    	
    	return redirect()->back();
    }
}
