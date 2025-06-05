<?php

namespace App\Http\Controllers;

use App\Models\GsmCategory;
use Illuminate\Http\Request;

class GsmCategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gsmcategory = GsmCategory::all();
        return view ('gsm-category.index')->with('gsmcategory', $gsmcategory);
    }


    public function create()
    {
        return view('gsm-category.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        GsmCategory::create($input);
        return redirect('gsm-category')->with('flash_message', 'Category Added!');
    }


    public function edit($id)
    {
        $gsmcategory = GsmCategory::find($id);
        return view('gsm-category.edit')->with('gsmcategory', $gsmcategory);
    }

    public function update(Request $request, $id)
    {
        $gsmcategory = GsmCategory::find($id);
        $input = $request->all();
        $gsmcategory->update($input);
        return redirect('gsm-category')->with('flash_message', 'Product description updated!');
    }
}
