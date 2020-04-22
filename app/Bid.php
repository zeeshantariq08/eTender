<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
	protected $table = 'bids';
    protected $guarded = [];

    public function tender()
    {
    	return $this->belongsTo('App\Tender', 'tender_id', 'id');
    }

    public function getDownloadFileAttribute()
    {
        $currentDate = Carbon::now()->toDateString();
            if($currentDate > $this->tender->close_date) {
               return true;
            }
        return false;
    }
}
