<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductFeatureModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InventoryFeaturesController extends Controller
{

    public function create($id)
    {
        $inventory = DB::table('product_models')
            ->join('product_category_models', 'product_models.category', '=', 'product_category_models.category_id')
            ->select('product_models.*', 'product_category_models.*')
            ->get();

        $inventory_id = $id;

        return view('inventory-detail.create', compact('inventory', 'inventory_id'));
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $products_feature = new ProductFeatureModel();
        $products_feature->product_id = $request->input('product_id');
        $products_feature->model_name = $request->input('model_name');
        $products_feature->seri_no = $request->input('seri_no');
        $products_feature->imei_no = $request->input('imei_no');
        $products_feature->notes = $request->input('notes');

        $products_feature->save();

        Log::info('A new inventory was created', ['email' => auth()->user()->email]);

        return redirect('inventory' . '/' .$products_feature->product_id)->with('flash_message', 'Product added successfully');

    }

    public function edit($id)
    {

        $inventory = DB::table('product_models')
            ->join('product_category_models', 'product_models.category', '=', 'product_category_models.category_id')
            ->select('product_models.*', 'product_category_models.*')
            ->get();

        $products_feature = DB::table('product_feature_models')->where('feature_product_id', '=' , $id)->get();
        return view('inventory-detail.edit', compact('inventory', 'products_feature'));

    }

    public function update(Request $request, $id)
    {
        $inventory = ProductFeatureModel::find($id);
        $input = $request->all();
        $inventory->update($input);
        Log::info('Inventory edited', ['email' => auth()->user()->email, 'inventory' => $inventory->model_name]);
        return redirect('inventory')->with('flash_message', 'Inventory information updated!');
    }

    public function destroy($id)
    {

    }

}