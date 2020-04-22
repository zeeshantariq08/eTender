<?php

use App\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //District table seeder
		DB::table('districts')->delete();

    		$district_data = [
		    			[
				        'province_id' 	=> '1',
				        'name' 			=> 'Bagh'
				    	],
				    	[
				        'province_id' 	=> '2',
				        'name' 			=> 'Quetta'
				    	],
				    	[
				        'province_id' 	=> '3',
				        'name' 			=> 'Hunza'
				    	],
				    	[
				        'province_id' 	=> '5',
				        'name' 			=> 'Peshawar'
				    	],
				    	[
				        'province_id' 	=> '6',
				        'name' 			=> 'Lahore'
				    	],
				    	[
				        'province_id' 	=> '6',
				        'name' 			=> 'Rawalpindi'
				    	],
				    	[
				        'province_id' 	=> '7',
				        'name' 			=> 'Karachi'
				    	],
				    	[
				        'province_id' 	=> '8',
				        'name' 			=> 'Islamabad'
				    	],
    				];
		    District::insert($district_data);

    }
}
