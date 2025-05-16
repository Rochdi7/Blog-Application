<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
{
    Category::create([
        'name' => $request->name,
        'slug' => \Str::slug($request->name),
        'description' => $request->description,
        'status' => $request->has('status'),
    ]);

    return redirect()->route('admin.categories.create')->with('success', 'Category created successfully!');
}

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
{
    $category = Category::findOrFail($id);

    $category->update([
        'name' => $request->name,
        'slug' => \Str::slug($request->name),
        'description' => $request->description,
        'status' => $request->has('status'),
    ]);

    return redirect()->route('admin.categories.edit', $category->id)->with('success', 'Category updated successfully!');
}

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
