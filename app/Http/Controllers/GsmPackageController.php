<?php

namespace App\Http\Controllers;

use App\Models\GsmPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GsmPackageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gsmPackage = GsmPackage::all();
        $gsmContent = DB::table('gsm_package_contents')
            ->get();
        return view ('gsm-package.index', compact('gsmPackage', 'gsmContent'));
    }


    public function create()
    {
        return view('gsm-package.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        GsmPackage::create($input);
        return redirect('gsm-package')->with('flash_message', 'Category Added!');
    }


    public function edit($id)
    {
        $gsmPackage = GsmPackage::find($id);
        return view('gsm-package.edit')->with('gsmPackage', $gsmPackage);
    }

    public function update(Request $request, $id)
    {
        $gsmPackage = GsmPackage::find($id);
        $input = $request->all();
        $gsmPackage->update($input);
        return redirect('gsm-package')->with('flash_message', 'Product description updated!');
    }
    public function gsm_package_remove(Request $request)
    {
        $gsm_package_id = $request["gsm_package_id"];
        DB::table('gsm_packages')
            ->where('gsm_packages.gsm_package_id', $gsm_package_id)
            ->delete();
        $gsm_package_id = $request["gsm_package_id"];
        DB::table('gsm_package_contents')
            ->where('gsm_package_contents.gsm_package_contents_package_id', $gsm_package_id)
            ->delete();

        return response()->json(['message' => 'GSM Package Removed!']);
    }
    public function gsm_content_remove(Request $request)
    {
        $gsm_package_content_id = $request["gsm_package_content_id"];
        DB::table('gsm_package_contents')
            ->where('gsm_package_contents.gsm_package_content_id', $gsm_package_content_id)
            ->delete();

        return response()->json(['message' => 'GSM Package Content Removed!']);
    }


}