<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function data()
    {
        return DataTables::of(Category::query())->make();
    }
}
