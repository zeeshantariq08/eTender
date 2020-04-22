<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenderCategory extends Model
{
    protected $table = 'tender_categories';

    protected $fillable = ['title'];

   public function tenders()
    {
    	return $this->hasMany('App\Tender', 'tender_category_id', 'id');
    }

}
