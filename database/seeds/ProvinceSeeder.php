<?php

use App\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	DB::table('provinces')->delete();
    		$province_data = [
		    			[
				        'name' 			=> 'Azad Kashmir (AJK)'
				    	],
				    	[
				        'name' 			=> 'Balochistan'
				    	],
				    	[
				        'name' 			=> 'Gilgit Baltistan'
				    	],
				    	[
				        'name' 			=> 'FATA'
				    	],
				    	[
				        'name' 			=> 'KPK'
				    	],
				    	[
				        'name' 			=> 'Punjab'
				    	],
				    	[
				        'name' 			=> 'Sindh'
				    	],
				    	[
				        'name' 			=> 'ISlamabad'
				    	],
    				];
		    Province::insert($province_data);
    }
}
