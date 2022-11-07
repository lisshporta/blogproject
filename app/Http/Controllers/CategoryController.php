<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('sessions.createcategory');

    }

    public function store()
    {


        $attributes = request()->validate([
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug'

        ]);

        Category::create($attributes);


        return redirect('/dashboard/posts')->with('success', 'Category Created!');
     }
}
