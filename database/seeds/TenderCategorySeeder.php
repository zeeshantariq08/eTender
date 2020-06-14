<?php

use Illuminate\Database\Seeder;
use App\TenderCategory;

class TenderCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        //District table seeder
		DB::table('tender_categories')->delete();

    		$category_data = [
		    			[
				        'title' 			=> 'Education'
				    	],
				    	[
				        'title' 			=> 'Health'
				    	],
				    	[
				        'title' 			=> 'Agriculture'
				    	],
				    	[
				        'title' 			=> 'Construction'
				    	],
				    	[
				        'title' 			=> 'Environment'
				    	],
				    	[
						'title' => 'Addition & Alteration'
						],
						[
						'title' => 'Advertising'
						],
						[
						'title' => 'Agriculture'
						],

						[
						'title' => 'Air Conditioning'
						],
						[
						'title' => 'Arms Ammunition'
						],

						[
						'title' => 'Auction'
						],

						[
						'title' => 'Audio Visual'
						],
						[
						'title' => 'Auto Parts'
						],

						[
						'title' => 'Automobiles/Vehicles'
						],

						[
						'title' => 'Bags'
						],
						[
						'title' => 'Balance'
						],			    	
						[
						'title' => 'Baldia'
						],

						[
						'title' => 'Bank Auctions'
						],


						[
						'title' => 'Bi Cycles Required'
						],

						[
						'title' => 'Bridges'
						],

						[
						'title' => 'Buildings'
						],

						[
						'title' => 'Cables'
						],
						[
						'title' => 'Chemicals'
						],
    				];
		    TenderCategory::insert($category_data);

    }
}
