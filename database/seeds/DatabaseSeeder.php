<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User Groups Seeder
        $this->call(UserGroupSeeder::class);

        // Users Seeder
        $this->call(UsersTableSeeder::class);

        // Software Modules Seeder
        $this->call(SubModulesSeeder::class);
        // User Groups Seeder
        $this->call(groupHasModulesSeeder::class);
        // Province Seeder
        $this->call(ProvinceSeeder::class);
        // Districts Seeder
        $this->call(DistrictSeeder::class);
        // Tender Category Seeder
        $this->call(TenderCategorySeeder::class);
    }
}
