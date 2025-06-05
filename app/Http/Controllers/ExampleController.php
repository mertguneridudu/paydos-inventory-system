<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class ExampleController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
                        ->join('orders', 'orders.user.id', '=', 'users.id')
                        ->select('users.*')
                        ->get();

        return view('homepage', compact('users'));

        $inventory = DB::table('product_models')
            ->join('product_feature_models', 'product_models.id', '=', 'product_feature_models.product_id')
            ->select('product_models.*', 'product_feature_models.*')
            ->get();

        return view('inventory-define.index')->with('inventory', $inventory);
    }

    public function show()
    {
        $users = DB::table('users')->get();
        return view('homepage', compact('users'));
    }

}