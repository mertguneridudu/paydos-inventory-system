<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategoryModel;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productcategory= ProductCategoryModel::all();
        return view ('category.index')->with('category', $productcategory);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        ProductCategoryModel::create($input);
        return redirect('category')->with('flash_message', 'Category Added!');
    }

    public function edit($id)
    {
        $productcategory = ProductCategoryModel::find($id);
        return view('category.edit')->with('category', $productcategory);
    }

    public function update(Request $request, $id)
    {
        $productcategory = ProductCategoryModel::find($id);
        $input = $request->all();
        $productcategory->update($input);
        return redirect('category')->with('flash_message', 'Product description updated!');
    }

    public function destroy($id)
    {
        ProductCategoryModel::destroy($id);
        return redirect('category')->with('flash_message', 'Product category deleted!');
    }

}
