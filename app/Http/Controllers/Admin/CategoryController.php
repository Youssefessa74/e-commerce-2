<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'meta_title' => ['nullable','string','max:255'],
            'meta_description' => ['nullable','string','max:1000'],
            'meta_keywords' => ['nullable','string','max:255'],
            'status' => ['required']
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->created_by = auth()->user()->id;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->status = $request->status;
        $category->save();
        toastr()->success('Category created successfully');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'meta_title' => ['nullable','string','max:255'],
            'meta_description' => ['nullable','string','max:1000'],
            'meta_keywords' => ['nullable','string','max:255'],
            'status' => ['required']
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->created_by = auth()->user()->id;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->status = $request->status;
        $category->save();
        toastr()->success('Category created successfully');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        toastr()->success('Category deleted successfully');
        return redirect()->route('admin.category.index');
    }
}
