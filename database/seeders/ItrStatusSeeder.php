<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItrStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $itrs = array(
            ['status' => 'completed','emp_id' => 1],
            ['status' => 'pending','emp_id' => 2],
            ['status' => 'completed','emp_id' => 3],
            ['status' => 'completed','emp_id' => 4],
            ['status' => 'completed','emp_id' => 5],
            ['status' => 'pending','emp_id' => 6],
            ['status' => 'not applicable','emp_id' => 7],
            ['status' => 'pending','emp_id' => 8],
            ['status' => 'pending','emp_id' => 9],
            ['status' => 'completed','emp_id' => 10],
            ['status' => 'pending','emp_id' => 11],
            ['status' => 'completed','emp_id' => 12],
            ['status' => 'pending','emp_id' => 13],
            ['status' => 'completed','emp_id' => 14],
            ['status' => 'completed','emp_id' => 15],
            ['status' => 'pending','emp_id' => 16],
            ['status' => 'completed','emp_id' => 17],
            ['status' => 'pending','emp_id' => 18],
            ['status' => 'completed','emp_id' => 19],
            ['status' => 'pending','emp_id' => 20],
            ['status' => 'completed','emp_id' => 21],
            ['status' => 'completed','emp_id' => 22],
            ['status' => 'completed','emp_id' => 23],
            ['status' => 'completed','emp_id' => 24],
            ['status' => 'completed','emp_id' => 25]
        );
        
        foreach($itrs as $itr){
            DB::table('itr_status')->insert([
                'status' => $itr['status'],
                'emp_id' => $itr['emp_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()       
            ]);
        }
    }
}
