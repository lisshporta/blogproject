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
            'name' => 'required',
            'slug' => 'required'

        ]);

        Category::create($attributes);

        return redirect('/')->with('success', 'Your post has been created.');
    }
}
