<?php

namespace App\Http\Controllers;

date_default_timezone_set("America/Bogota");

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activos = DB::connection('mysql2')->table('activos_tecnologicos')->get();
        $hoy = date("Y-m-d");
        return view('home', compact("hoy",'activos'));
    }

    public function search(Request $request)
    {
        $from = $request->from;
        $query = "select count(*) total from activos_tecnologicos r "
            . "join users u on u.id = r.user_id "
            . "where r.date_record like '%" . $request->search . "%' "
            . "limit " . $from . ", 15";
        $count = DB::select($query);
        $total = $count[0]->total;
        $query2 = "select r.*, concat(u.first_name,' ', u.last_name) name from records_users r "
            . "join users u on u.id = r.user_id "
            . "where r.date_record like '%" . $request->search . "%' "
            . "limit " . $from . ", 15";
        $records = DB::select($query2);
        $records["total_registros"] = count($records);
        $records["count"] = $total;
        return $records;
    }
}
