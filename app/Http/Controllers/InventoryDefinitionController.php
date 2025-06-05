<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryDefinition;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InventoryDefinitionController extends Controller
{

    public function index()
    {
        $inventories = DB::table('product_feature_models')
            ->leftJoin('inventory_definitions', 'inventory_definitions.feature_id', '=', 'product_feature_models.feature_product_id')
            ->leftJoin('user_feature_models', 'inventory_definitions.user_id', '=', 'user_feature_models.id')
            ->join('product_models', 'product_models.id', '=', 'product_feature_models.product_id')
            ->join('product_category_models', 'product_models.category', '=', 'product_category_models.category_id')
            ->select(
                'product_feature_models.feature_product_id',
                DB::raw('MAX(inventory_definitions.user_id) AS user_id'),
                DB::raw('MAX(product_feature_models.model_name) AS model_name'),
                DB::raw('MAX(product_feature_models.seri_no) AS seri_no'),
                DB::raw('MAX(product_feature_models.imei_no) AS imei_no'),
                DB::raw('MAX(product_feature_models.notes) AS notes'),
                DB::raw('MAX(product_feature_models.status) AS status'),
                DB::raw('MAX(product_feature_models.updated_at) AS updated_at'),
                DB::raw('MAX(product_category_models.category_name) AS category_name'),
                DB::raw('MAX(product_models.name) AS product_name'),
                DB::raw('MAX(product_models.id) AS product_id'),
                DB::raw('MAX(inventory_definitions.updated_at) AS inventory_date'),
                DB::raw('MAX(user_feature_models.name) AS name'),
                DB::raw('MAX(user_feature_models.surname) AS surname'),
                DB::raw('MAX(inventory_definitions.status_info) AS status_info')
            )
            ->groupBy('product_feature_models.feature_product_id')
            ->union(
                DB::table('inventory_definitions')
                    ->rightJoin('product_feature_models', 'inventory_definitions.feature_id', '=', 'product_feature_models.feature_product_id')
                    ->rightJoin('user_feature_models', 'inventory_definitions.user_id', '=', 'user_feature_models.id')
                    ->join('product_models', 'product_models.id', '=', 'product_feature_models.product_id')
                    ->join('product_category_models', 'product_models.category', '=', 'product_category_models.category_id')
                    ->whereNull('product_feature_models.feature_product_id')
                    ->select(
                        'product_feature_models.feature_product_id',
                        DB::raw('MAX(inventory_definitions.user_id) AS user_id'),
                        DB::raw('MAX(product_feature_models.model_name) AS model_name'),
                        DB::raw('MAX(product_feature_models.seri_no) AS seri_no'),
                        DB::raw('MAX(product_feature_models.imei_no) AS imei_no'),
                        DB::raw('MAX(product_feature_models.notes) AS notes'),
                        DB::raw('MAX(product_feature_models.status) AS status'),
                        DB::raw('MAX(product_feature_models.updated_at) AS updated_at'),
                        DB::raw('MAX(product_category_models.category_name) AS category_name'),
                        DB::raw('MAX(product_models.name) AS product_name'),
                        DB::raw('MAX(product_models.id) AS product_id'),
                        DB::raw('MAX(inventory_definitions.updated_at) AS inventory_date'),
                        DB::raw('MAX(user_feature_models.name) AS name'),
                        DB::raw('MAX(user_feature_models.surname) AS surname'),
                        DB::raw('MAX(inventory_definitions.status_info) AS status_info')
                    )
                    ->groupBy('product_feature_models.feature_product_id')
            )
            ->get();

        Log::info('Went to inventory definition screen', ['email' => auth()->user()->email]);

        return view('inventory-define.index')->with('inventories', $inventories);
    }

    public function create()
    {
        $inventory = DB::table('product_feature_models')
            ->select('*')
            ->join('product_models','product_feature_models.product_id','=','product_models.id')
            ->whereNotIn('product_feature_models.feature_product_id',(function ($query) {
                $query->from('inventory_definitions')
                    ->select('feature_id')
                    ->where('status_info','=',1);
            }))
            ->get();

        $users = DB::table('user_feature_models')
            ->where([
                ['isActive', '=', 0]
            ])
            ->get();

        return view('inventory-define.create', compact('inventory', 'users'));
    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $inventory_definition = new InventoryDefinition();
        $inventory_definition->feature_id = $request->input('feature_id');
        $inventory_definition->user_id = $request->input('user_id');
        $inventory_definition->mac_address_ethernet = $request->input('mac_address_ethernet');
        $inventory_definition->mac_address_wifi = $request->input('mac_address_wifi');
        $inventory_definition->status_info = $request->input('status_info');

        $inventory_definition->save();

        DB::table('inventory_history')
            ->where('inventory_history.feature_product_id', '=', $request->input('feature_id'))
            ->update(['status_info' => 1]);

        Log::info('A new inventory was defined', ['email' => auth()->user()->email]);

        return redirect('inventory-define')->with('flash_message', 'Inventory successfully defined');
    }

    public function edit($id)
    {
        $update = DB::table('inventory_definitions')
            ->where('id', '=' ,$id)
            ->update(['status_info' => 0]);

        Log::info('Inventory definition edited', ['email' => auth()->user()->email]);

        return view('inventory-define.index', compact('update'));

    }

    public function update($id)
    {

    }

    public function destroy($id)
    {
        InventoryDefinition::destroy($id);
        return redirect('inventory-define')->with('flash_message', 'Inventory definition deleted!');
    }

}