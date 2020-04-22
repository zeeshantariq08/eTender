<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tender extends Model
{
	protected $table = 'tenders';
    protected $guarded = [];
    protected $dates = ['open_date','close_date'];

    public function tenderCategories()
    {
    	return $this->belongsTo('App\TenderCategory', 'tender_category_id', 'id');
    }

    public function bids()
    {
    	return $this->hasMany('App\Bid', 'tender_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    
}
