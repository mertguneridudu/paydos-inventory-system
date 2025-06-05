<?php

namespace App\Http\Controllers;

use App\Models\GsmPackageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GsmPackageContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gsmPackageContent = DB::table('gsm_package_contents')
            ->join('gsm_packages', 'gsm_package_id', '=', 'gsm_package_contents_package_id')
            ->get();
        return view ('gsm-package-content.index')->with('gsmPackageContent', $gsmPackageContent);
    }


    public function create()
    {
        $gsmPackage = DB::table('gsm_packages')
            ->get();
        return view('gsm-package-content.create' , compact('gsmPackage'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        GsmPackageContent::create($input);
        return redirect('gsm-package-content')->with('flash_message', 'GSM Paket İçeriği Eklendi!');
    }


    public function edit($id)
    {
        $gsmPackageContent = GsmPackageContent::find($id);
        return view('gsm-package-content.edit')->with('gsmPackageContent', $gsmPackageContent);
    }

    public function update(Request $request, $id)
    {
        $gsmPackageContent = GsmPackageContent::find($id);
        $input = $request->all();
        $gsmPackageContent->update($input);
        return redirect('gsm-package-content')->with('flash_message', 'GSM Paket İçeriği güncellendi!');
    }
}