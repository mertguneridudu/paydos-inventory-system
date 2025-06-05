<?php

namespace App\Http\Controllers;

use App\Models\GsmAssigned;
use App\Models\GsmCategory;
use App\Models\GsmPackage;
use App\Models\GsmPackageContent;
use App\Models\UserFeatureModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GsmAssignedController extends Controller
{

    public function index()
    {
        $gsm_assigned = DB::table('gsm_assigned')
            ->join('user_feature_models', 'gsm_assigned.gsm_assigned_user', '=', 'user_feature_models.id')
            ->join('gsm_packages', 'gsm_assigned.gsm_assigned_package_id', '=', 'gsm_packages.gsm_package_id')
            ->join('gsm_package_contents', 'gsm_assigned.gsm_assigned_package_content_id', '=', 'gsm_package_contents.gsm_package_content_id')
            ->select('gsm_assigned.*', 'user_feature_models.*', 'gsm_packages.*', 'gsm_package_contents.*')
            ->where('gsm_assigned.status', 1)
            ->get();


        return view('gsm-assigned.index')->with('gsm_assigned', $gsm_assigned);
    }


    public function create()
    {

        $users = DB::table('user_feature_models')
        ->where([
            ['isActive', '=', 0]
            ])
        ->get();
        $gsmCategory = GsmCategory::all();
        $gsmPackage = GsmPackage::all();
        $gsmPackageContent = GsmPackageContent::all();
        return view('gsm-assigned.create', compact('gsmCategory', 'gsmPackage', 'gsmPackageContent', 'users'));
    }


    public function store(Request $request)
    {

        $input = $request->all();
        GsmAssigned::create($input);
        return redirect('gsm-assigned')->with('flash_message', 'Category Added!');
    }


    public function show(GsmAssigned $gsmAssigned)
    {
        //
    }


    public function edit($id, Request $request)
    {

        $gsm_table = DB::table('gsm_assigned')
            ->join('user_feature_models', 'gsm_assigned.gsm_assigned_user', '=', 'user_feature_models.id')
            ->join('gsm_packages', 'gsm_assigned.gsm_assigned_package_id', '=', 'gsm_packages.gsm_package_id')
            ->join('gsm_package_contents', 'gsm_assigned.gsm_assigned_package_content_id', '=', 'gsm_package_contents.gsm_package_content_id')
            ->select('gsm_assigned.*', 'user_feature_models.*', 'gsm_packages.*', 'gsm_package_contents.*')
            ->where('gsm_assigned.gsm_assigned_id', $id)
            ->get();
        $users = DB::table('user_feature_models')
            ->where([
                ['isActive', '=', 0]
            ])
            ->get();
        $gsm_package = DB::table('gsm_packages')
            ->get();
        $gsmPackageContent = GsmPackageContent::all();
        $gsmAssigned = GsmAssigned::find($id);
        return view('gsm-assigned.edit', compact('gsmAssigned', 'gsm_table', 'users', 'gsm_package', 'gsmPackageContent'));
    }


    public function update(Request $request, $id)
    {
        $gsmAssigned = GsmAssigned::find($id);
        $input = $request->all();
        $gsmAssigned->update($input);
        return redirect('gsm-assigned')->with('flash_message', 'GSM Updated!');
    }
    public function gsm_remove(Request $request)
    {
        $gsm_assigned_id = $request["gsm_assigned_id"];
        DB::table('gsm_assigned')
            ->where('gsm_assigned.gsm_assigned_id', $gsm_assigned_id)
            ->update(['gsm_assigned.status' => 0]);

        return response()->json(['message' => 'GSM Removed!']);
    }

    public function getGsmPackageContent(Request $request)
    {
        // Get the ID of the selected Gsm Package
        $gsmPackageId = $request->input('gsm_package_id');

        // Get the contents belonging to the selected Gsm Package using GsmPackageContent model
        $gsmPackageContents = GsmPackageContent::where('gsm_package_contents_package_id', $gsmPackageId)->get();

        // Return contents in JSON format
        return response()->json($gsmPackageContents);
    }

}