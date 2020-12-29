<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $companies = array(
            ['name' => 'Prologic Web Solution','address' => 'Delhi, indian'],
            ['name' => 'Webore Technologies','address' => 'Noida, indian'],
            ['name' => 'Dream Soft Technologies','address' => 'Delhi, indian'],
            ['name' => 'Think Future Technologies','address' => 'Gurgaon, indian'],
            ['name' => 'Teleperformance Ltd','address' => 'Gurgaon, indian'],
        );

        foreach($companies as $company){
            DB::table('companies')->insert([
                'name' => $company['name'],
                'address' => $company['address'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()        
            ]);
        }
    }
}
