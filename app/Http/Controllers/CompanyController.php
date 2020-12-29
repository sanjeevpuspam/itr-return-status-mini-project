<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use App\Models\ItrStatus;

use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index(){
        
        $data = DB::table('employees')
                ->join('itr_status', 'employees.id', '=', 'itr_status.emp_id')
                ->join('companies', 'employees.company_id', '=', 'companies.id')
                ->select('employees.*', 'itr_status.status','companies.name as cname','companies.id as cid')
                ->get();
               
        $company = DB::table('employees')
        ->join('itr_status', 'employees.id', '=', 'itr_status.emp_id')
        ->join('companies', 'employees.company_id', '=', 'companies.id')
        ->select('companies.name as cname','companies.id as cid',
            DB::raw('SUM(CASE WHEN itr_status.status = "completed" THEN 1 ELSE 0 END) as completed_tot'),
            DB::raw('SUM(CASE WHEN itr_status.status = "pending" THEN 1 ELSE 0 END) as pending_tot'),
            DB::raw('SUM(CASE WHEN itr_status.status = "not applicable" THEN 1 ELSE 0 END) as applicable_tot')
            )
        ->groupBy('employees.company_id')
        ->orderBy('completed_tot','ASC')
        ->get();

        return view('index', ['company' => $company,'data'=>$data]);
    }
}
