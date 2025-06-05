<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductCategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {

        $inventory = DB::table('product_models')
            ->join('product_category_models', 'product_models.category', '=', 'product_category_models.category_id')
            ->select('product_models.*', 'product_category_models.*')
            ->get();

        Log::info('Went to brand page', ['email' => auth()->user()->email]);


        return view ('inventory.index')->with('inventory', $inventory);
    }

    public function create()
    {
        $category = ProductCategoryModel::all();
        return view ('inventory.create')->with('category', $category);
    }


    //list page
    public function show($id)
    {
        $inventories = DB::table('product_feature_models')
        ->where('product_id', $id)
        ->where('status', 1)
        ->get();

        Log::info('Went to brand page with ID information', ['email' => auth()->user()->email, 'brand' => $id]);


        $inventory = ProductModel::find($id);
        return view('inventory.show', compact('inventory', 'inventories'));
    }

    public function store(Request $request)
    {

        $input = $request->all();
        $fileName = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $input["image"] = '/storage/'.$path;

        ProductModel::create($input);

        Log::info('Created a new brand', ['email' => auth()->user()->email]);

        return redirect('inventory')->with('flash_message', 'Inventory Added!');
    }

    public function edit($id)
    {
        $inventory = ProductModel::find($id);
        $category = ProductCategoryModel::all();
        return view('inventory.edit', compact('inventory', 'category'));
    }

    public function update(Request $request, $id)
    {
        $inventory = ProductModel::find($id);
        $input = $request->all();
        $inventory->update($input);

        Log::info('Brand with ID information was corrected', ['email' => auth()->user()->email, 'brand' => $id]);

        return redirect('inventory')->with('flash_message', 'Inventory information updated!');
    }

    public function destroy($id)
    {
        ProductModel::destroy($id);
        return redirect('inventory')->with('flash_message', 'Inventory deleted!');
    }

    public function inventory_inactive(Request $request)
    {
        DB::table('product_feature_models')
            ->where('feature_product_id', '=', $request["id"])
            ->update(['status' => 0]);


        Log::info('Inventory with ID information has become inactive', ['email' => auth()->user()->email, 'inventory' => $request["id"]]);


        return response()->json(['id' => $request["id"],
        'success'=>'Status change successfully.']);
    }

}
