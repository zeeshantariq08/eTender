<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Bid extends Model
{
	protected $table = 'bids';
    protected $guarded = [];

    

    public function tender()
    {
    	return $this->belongsTo('App\Tender', 'tender_id', 'id');
    }

    public function getCurrentDate()
    {
       $currentDate = Carbon::now()->toDateString();
       return $currentDate;
    }

    public function getDownloadFileAttribute()
    {
        if($this->getCurrentDate() > $this->tender->close_date) {
           return true;
        }
            return false;
    }
    public function getCompanyDecryptAttribute()
    {
        if($this->getCurrentDate() > $this->tender->close_date) {
            return Crypt::decryptString($this->company_name);
        }

        return $this->company_name;
    }

    public function getAmountDecryptAttribute()
    {
        if($this->getCurrentDate() > $this->tender->close_date) {
            return Crypt::decryptString($this->amount);
        }
        
        return $this->amount;
    }

    public function getExperienceDecryptAttribute()
    {
        if($this->getCurrentDate() > $this->tender->close_date) {
            return Crypt::decryptString($this->experience);
        }
        
        return $this->experience;
    }

    public function getContactPersonDecryptAttribute()
    {
        if($this->getCurrentDate() > $this->tender->close_date) {
           return Crypt::decryptString($this->contact_person);
        }
        
        return $this->contact_person;
    }


    public function getEmailDecryptAttribute()
    {
        if($this->getCurrentDate() > $this->tender->close_date) {
           return Crypt::decryptString($this->email);
        }
        
        return $this->email;

        
    }

}
