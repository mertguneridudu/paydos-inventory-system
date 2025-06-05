<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserFeatureModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Models\TeamMember;
use Carbon\Carbon;

class UserController extends Controller
{

    public function index()
    {
        $users = DB::table('user_feature_models')
                ->leftJoin('teams', 'user_feature_models.team', '=', 'teams.team_id')
                ->select('user_feature_models.*', 'teams.*')
                ->where([
                    ['isActive', '=', 0]
                    ])
                ->get();

        $login = auth()->user()->email;

        Log::info('All users page was viewed.', ['email' => $login]);

        return view('user.index', compact('users'));
    }

    public function user_inactive()
    {
        $users = DB::table('user_feature_models')
                ->leftJoin('teams', 'user_feature_models.team', '=', 'teams.team_id')
                ->select('user_feature_models.*', 'teams.*')
                ->where([
                    ['isActive', '=', 1]
                    ])
                ->get();

        Log::info('Went to inactive user screen', ['email' => auth()->user()->email]);


        return view('inactive', compact('users'));
    }

    public function create()
    {
        $teams = DB::table('teams')
        ->select('teams.*')
        ->get();

        return view('user.create', compact('teams'));
    }

    public function show($id)
    {

        $inventory = DB::table('inventory_definitions')
            ->join('product_feature_models', 'product_feature_models.feature_product_id', '=', 'inventory_definitions.feature_id')
            ->join('product_models', 'product_models.id', '=', 'product_feature_models.product_id')
            ->select('inventory_definitions.*','inventory_definitions.created_at as new_date', 'product_feature_models.*', 'product_models.*')
            ->where([
                ['user_id', '=', (int)$id],
                ['status_info', '=', 1]
            ])
            ->get();

        $login = auth()->user()->email;

        $user = DB::table('user_feature_models')
            ->leftJoin('team_members', 'team_members.team_member', '=', 'user_feature_models.id')
            ->leftJoin('teams', 'teams.team_id', '=', 'team_members.team_feature_id')
            ->select('user_feature_models.*', 'team_members.*', 'teams.*')
            ->where('user_feature_models.id', $id)
            ->get()
            ->toArray();


        $user[0]->job_mail_pass = $user[0]->job_mail_pass !="" ? Crypt::decryptString($user[0]->job_mail_pass) : "";

        return view('user.show', compact('user', 'inventory'));

    }

    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // If a file is selected
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $input["image"] = '/storage/' . $path;
        } else {
            // If no file is selected
            $defaultFileName = '../asset/image/person.png'; // Default file name
            $path = storage_path('app/public/images/' . $defaultFileName);
            $input["image"] = '/storage/' . $defaultFileName;
        }

        $input["job_mail_pass"] = $input["job_mail_pass"] != "" ? Crypt::encryptString($input["job_mail_pass"]) : "";


        $newUser = UserFeatureModel::create($input);


        $newUserId = $newUser->id;


        $teamName = $newUser->department;


        $team = UserFeatureModel::join('teams', 'teams.team_name', '=', 'user_feature_models.department')
            ->select('teams.team_id')
            ->where('user_feature_models.id', $newUserId)
            ->first();





        $teamId = $team->team_id;


        TeamMember::create([
            'team_member' => $newUserId,
            'team_feature_id' => $teamId,
        ]);


        Log::info('Another function was executed');


        Log::info('New user created', ['email' => auth()->user()->email]);
        $users = DB::table('team_members')
            ->join('user_feature_models', 'team_members.team_member', '=', 'user_feature_models.id')
            ->join('teams', 'team_members.team_feature_id', '=', 'teams.team_id')
            ->select('team_members.*', 'teams.team_id', 'teams.team_name', 'user_feature_models.*')
            ->get();
        return view('user.index', compact('users'))->with('flash_message', 'User added successfully!');
    }


    public function edit($id)
    {
        $team = DB::table('teams')->get();
        $user = UserFeatureModel::find($id);
        $user["job_mail_pass"] = $user["job_mail_pass"] !="" ? Crypt::decryptString($user["job_mail_pass"]) : "";

        return view('user.edit', compact('user', 'team'));
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();

        if($request->file('image') != ""){
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $input["image"] = '/storage/'.$path;
        }

        Log::info('User with ID information was edited', ['email' => auth()->user()->email, 'user' => $id]);


        $users_feature = UserFeatureModel::find($id);
        if($input["job_mail_pass"] !=""){
            $input["job_mail_pass"] = Crypt::encryptString($input["job_mail_pass"]);
        }

        $users_feature->update($input);
        $team = UserFeatureModel::join('team_members', 'team_members.team_member', '=', 'user_feature_models.id')
            ->join('teams', 'teams.team_name', '=', 'user_feature_models.department')
            ->select('team_members.team_member', 'teams.team_name', 'teams.team_id')
            ->where('user_feature_models.id', $id)
            ->first();

        $teamId = $team->team_id;

        TeamMember::updateOrCreate(
            ['team_member' => $id],
            ['team_feature_id' => $teamId]
        );



        return redirect('user/')->with('flash_message', 'User updated successfully');
    }

    public function remove_user(Request $request)
    {
        DB::table('user_feature_models')
            ->where('id', '=', $request["id"])
            ->update(['isActive' => 1]);

        Log::info('User with ID information became passive', ['email' => auth()->user()->email, 'user' => $request["id"]]);

        $user_id = $request["id"];

        DB::table('inventory_definitions')
            ->where('user_id', '=', $user_id)
            ->update(['user_id' => "", 'status_info' => 0]);

        DB::table('team_members')
            ->where('team_members.team_member', '=', $user_id)
            ->update(['member_status' => 0]);

        DB::table('gsm_assigned')
            ->where('gsm_assigned.gsm_assigned_user', '=', $user_id)
            ->update(['status' => 0]);

        return response()->json(['id' => $request["id"],
        'success'=>'Status change successfully.']);
    }

    public function add_user_again(Request $request)
    {
        DB::table('user_feature_models')
            ->where('id', '=', $request["id"])
            ->update(['isActive' => 0]);

        Log::info('User with ID information became active', ['email' => auth()->user()->email, 'user' => $request["id"]]);
        $user_id = $request["id"];
        DB::table('team_members')
            ->where('team_members.team_member', '=', $user_id)
            ->update(['member_status' => null]);

        return response()->json(['id' => $request["id"],
        'success'=>'Status change successfully.']);
    }

    public function remove_inventory(Request $request)
    {
        $inventory_history = DB::table('inventory_definitions')
            ->where('feature_id', '=', $request['feature_id'])
            ->where('user_id', '!=', '')
            ->first();

        DB::table('inventory_history')->insert([
            'feature_product_id' => $inventory_history->feature_id,
            'user_id' => $inventory_history->user_id,
            'status_info' => 0,
        ]);

        DB::table('inventory_history')
            ->where('feature_product_id', $request['feature_id'])
            ->update(['status_info' => 0]);

        DB::table('inventory_definitions')
            ->where('inventory_definitions.feature_id', '=',$request["feature_id"])
            ->update(['status_info' => 0,
                      'user_id'=> '']);
        


    }

    public function view_inventory($id)
    {
        $inventory_info = DB::table('inventory_history')
            ->join('product_feature_models', 'product_feature_models.feature_product_id', '=', 'inventory_history.feature_product_id')
            ->join('product_models', 'product_models.id', '=', 'product_feature_models.product_id')
            ->join('user_feature_models', 'user_feature_models.id', '=', 'inventory_history.user_id')
            ->select('product_feature_models.*', 'product_models.*', 'inventory_history.*')
            ->where('user_id', '=', $id)
            ->get();

        $user_info = UserFeatureModel::find($id);

        return view('user.inventory', compact('inventory_info', 'user_info'));
    }

    public function create_pdf($id)
    {
        $inventory = DB::table('inventory_definitions')
            ->join('product_feature_models', 'product_feature_models.feature_product_id', '=', 'inventory_definitions.feature_id')
            ->join('product_models', 'product_models.id', '=', 'product_feature_models.product_id')
            ->select('inventory_definitions.*', 'product_feature_models.*', 'product_models.*')
            ->where([
                ['user_id', '=', (int)$id],
                ['status_info', '=', 1]
            ])
            ->get();

        $user_info = UserFeatureModel::find($id);
        $date = Carbon::now();
        $day = Carbon::parse($date)->format('d');
        $month = Carbon::parse($date)->format('m');
        $year = Carbon::parse($date)->format('Y');



        return view('user.pdf', compact('inventory', 'user_info', 'day', 'month','year'));
    }
}
