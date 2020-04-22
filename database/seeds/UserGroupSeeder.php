<?php

use App\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (UserGroup::count() == 0) {
    		$data = [
		    			[
				        'name' 			=> 'Super User',
				        'slug' 			=> 'Super-User',
				        'description' 	=> 'Super Admin Access Configuration'
				    	],
				    	[
				        'name' 			=> 'Tenderer',
				        'slug' 			=> 'Tenderer',
				        'description' 	=> 'Tenderer description'
				    	],
				    	[
				        'name' 			=> 'Bidder',
				        'slug' 			=> 'Bidder',
				        'description' 	=> 'Bidder description'
				    	],
    				];
		    UserGroup::insert($data);
		}else{
			echo '*user_groups* Table Already has Data\n';
		}
    }
}
