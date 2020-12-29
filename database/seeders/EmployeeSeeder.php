<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function randomDateInRange($date1, $date2){
        if (!is_a($date1, 'DateTime')) {
            $date1 = new DateTime( (ctype_digit((string)$date1) ? '@' : '') . $date1);
            $date2 = new DateTime( (ctype_digit((string)$date2) ? '@' : '') . $date2);
        }
        $random_u = random_int($date1->format('U'), $date2->format('U'));
        $random_date = new DateTime();
        $random_date->setTimestamp($random_u);
        return $random_date->format('Y-m-d');
    }
    public function run()
    {
        $pannum = rand(0000,9999);
        $employee = array(
            ['name' => 'Sanjeev Puspam','annual_income'=>'600000','comp_id'=>1],
            ['name' => 'Santosh Suman','annual_income'=>'700000','comp_id'=>1],
            ['name' => 'Ashok Kumar','annual_income'=>'500000','comp_id'=>1],
            ['name' => 'Mukesh Kumar','annual_income'=>'650000','comp_id'=>1],
            ['name' => 'Munna Kumar','annual_income'=>'620000','comp_id'=>1],
            ['name' => 'Rahul Kumar','annual_income'=>'510300','comp_id'=>2],
            ['name' => 'Rajesh Suman','annual_income'=>'490000','comp_id'=>2],
            ['name' => 'Raunak Raz','annual_income'=>'702000','comp_id'=>2],
            ['name' => 'Sumit Rana','annual_income'=>'606000','comp_id'=>2],
            ['name' => 'Sanjeev Rana','annual_income'=>'600000','comp_id'=>2],
            ['name' => 'Mukesh Kumar','annual_income'=>'610000','comp_id'=>3],
            ['name' => 'Raja Rosan','annual_income'=>'604000','comp_id'=>3],
            ['name' => 'Samarjeet Kaur','annual_income'=>'680000','comp_id'=>3],
            ['name' => 'Randhir Rana','annual_income'=>'690000','comp_id'=>3],
            ['name' => 'Rausan Rana','annual_income'=>'600000','comp_id'=>3],
            ['name' => 'Ram Kumar' ,'annual_income'=>'621000','comp_id'=>4],
            ['name' => 'Shyam Suman', 'annual_income'=>'610000','comp_id'=>4],
            ['name' => 'Laza Ram', 'annual_income'=>'620000','comp_id'=>4],
            ['name' => 'Raunak Rana', 'annual_income'=>'601000','comp_id'=>4],
            ['name' => 'Ramkumar Rana', 'annual_income'=>'602000','comp_id'=>4],
            ['name' => 'Mandeep Nirankari' ,'annual_income'=>'623000','comp_id'=>5],
            ['name' => 'Komal Kumar', 'annual_income'=>'510000','comp_id'=>5],
            ['name' => 'Annu kumari', 'annual_income'=>'620000','comp_id'=>5],
            ['name' => 'Sunidhi Chouhan', 'annual_income'=>'605000','comp_id'=>5],
            ['name' => 'Khushboo', 'annual_income'=>'500001','comp_id'=>5]
        );

        foreach($employee as $emp){
            DB::table('employees')->insert([
                'name' => $emp['name'],
                'dob' => $this->randomDateInRange('1980-01-01','1990-01-01'),
                'email' => Str::lower(Str::Random(10)).'@gmail.com',
                'pan_number' => 'CAIAA'.$pannum.'R',
                'annual_income'=> $emp['annual_income'],
                'company_id' => $emp['comp_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()        
            ]);
        }
    }
}
