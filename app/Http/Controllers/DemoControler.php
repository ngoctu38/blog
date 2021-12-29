<?php

namespace App\Http\Controllers;

use App\Data;
use App\Demo;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DemoControler extends Controller
{
    public function index()
    {
        $dataTotal = DB::table('tbl_data')
            ->where('is_approve', '<', 2)
            ->get();
        $total = $dataTotal->count();
            $data = DB::table('tbl_data')
                ->where('updated_date', '>=', $_COOKIE['date'])
                ->where('is_approve', '<', 2)
                ->get();
            $totalNew = $data->count();
            return view('demo.demo', compact('total', 'data', 'dataTotal','totalNew'));

    }
    public  function  Add(){
        setcookie('date', Carbon::now('Asia/Ho_Chi_Minh'));
    }
    public function list(){
        return view('demo.list');
    }
}
