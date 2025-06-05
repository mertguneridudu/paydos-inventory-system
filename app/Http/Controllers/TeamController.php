<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\UserFeatureModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TeamController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $productcategory = Team::all();
        return view ('team.index')->with('kategori', $productcategory);
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Team::create($input);

        Log::info('New team added', ['email' => auth()->user()->email]);

        return redirect('team')->with('flash_message', 'Team added!');
    }

    //list page
    public function show($id)
    {

        $teams = DB::table('team_members')
        ->join('user_feature_models', 'team_members.team_member', '=', 'user_feature_models.id')
        ->join('teams', 'team_members.team_feature_id', '=', 'teams.team_id')
        ->select('team_members.*', 'user_feature_models.*', 'teams.*')
        ->where('team_feature_id', '=', $id)
        ->where('isActive', '=', 0)
        ->get();

        Log::info('Team screen viewed', ['email' => auth()->user()->email, 'team' => $id]);

        return view('team.show', compact('teams'));
    }

    public function edit($id)
    {
        $teams = DB::table('team_members')
            ->join('user_feature_models', 'team_members.team_member', '=', 'user_feature_models.id')
            ->join('teams', 'team_members.team_feature_id', '=', 'teams.team_id')
            ->select('user_feature_models.name', 'user_feature_models.surname', 'team_members.team_member as team_member_id', 'teams.team_name')            ->where('team_feature_id', '=', $id)
            ->where('isActive', '=', 0)
            ->get();

        $users = $teams;
        $category = Team::find($id);
        $array = [];
        $i = 0;
        foreach ($category->TeamsNumber as $item2) {
            $array[$i] = $item2->team_member;
            $i++;
        }

        return view('team.edit', compact('category', 'users', 'array'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $team = Team::find($id);
        TeamMember::where('team_feature_id', $id)->delete();
        if(is_array($request["teamselect"])){
            foreach($input["teamselect"] as $item){
                $input2["team_member"] = $item;
                $input2["team_feature_id"] = $id;
                TeamMember::where('team_member', $item)->delete();
                TeamMember::create($input2);
            }
        }

        Log::info('Team information updated', ['email' => auth()->user()->email]);

        $team->update($input);
        
        return redirect('team')->with('flash_message', 'Team information updated!');
        
    }

    public function team_delete(Request $request)
    {
        Team::destroy($request["id"]);

        TeamMember::where('team_feature_id', $request["id"])->delete();
    
        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');

        return redirect('team')->with('flash_message', 'Team deleted successfully!');
    }

}
