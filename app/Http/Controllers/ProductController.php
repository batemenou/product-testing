<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function data(Request $request)
    {
        $products_query= Product::query();

        if ($request->get('category')) {
            $category= Category::query()->findOrFail($request->category);
            $user= Auth::user();
            if ($user and ($user->age < $category->min_age or $user->age > $category->max_age))
                abort(403);

            $products_query->where('category_id', $request->category);
        }

        return DataTables::of($products_query)
            ->editColumn('category_id', function ($product) {
                return $product->category->title;
            })
            ->editColumn('created_at', function ($product) {
                return Carbon::parse($product->created_at)->toDateTimeString();
            })
            ->addColumn('action', function ($product) {
                return '<a href="'.route('show_product', ['id'=> $product->id]).'" class="btn btn-info">Show</a>';
            })
            ->make();
    }

    public function show($id)
    {
        $product= Product::query()->findOrFail($id);
        $category= $product->category;
        $user= Auth::user();
        if ($user and ($user->age < $category->min_age or $user->age > $category->max_age))
            abort(403);

        return view('product.show', compact('product'));
    }
}
