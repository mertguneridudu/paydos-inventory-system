<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $countUser = DB::table('user_feature_models')
            ->where('isActive', '=', 0)
            ->count();
        $countUserDeactive = DB::table('user_feature_models')
        ->where('isActive', '=', 1)
        ->count();

        $countProduct = DB::table('product_feature_models')->count();
        $countInventory = DB::table('inventory_definitions')
        ->where('status_info', '=', 1)
        ->count();
        $countNumber = DB::table('gsm_assigned')->count();
        $countDepartment = DB::table('gsm_categories')->count();


        $team = DB::table('teams')
            ->select('teams.*', DB::raw("COUNT(team_members.team_member_id) as count_member"))
            ->join('team_members', 'team_members.team_feature_id', '=', 'teams.team_id')
            ->whereNull('team_members.member_status')
            ->groupBy('teams.team_id')
            ->orderBy('teams.team_name', 'asc')
            ->get();


        return view('home', compact('countUser', 'countProduct', 'countInventory', 'team', 'countUserDeactive', 'countNumber', 'countDepartment'));
    }
}