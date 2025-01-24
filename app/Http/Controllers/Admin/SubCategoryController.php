<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $subCategoryDataTable)
    {
        return $subCategoryDataTable->render(('admin.sub-category.index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create',compact('categories'));
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
            'category_id' => ['required','exists:categories,id'],
            'status' => ['required']
        ]);
        $sub_category = new SubCategory();
        $sub_category->name = $request->name;
        $sub_category->slug = Str::slug($request->name);
        $sub_category->category_id = $request->category_id;
        $sub_category->created_by = auth()->user()->id;
        $sub_category->meta_title = $request->meta_title;
        $sub_category->meta_description = $request->meta_description;
        $sub_category->meta_keywords = $request->meta_keywords;
        $sub_category->status = $request->status;
        $sub_category->save();
        toastr()->success('Category created successfully');
        return redirect()->route('admin.sub-category.index');
    }

  
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.sub-category.edit',compact('categories','sub_category'));
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
            'category_id' => ['required','exists:categories,id'],
            'status' => ['required']
        ]);
        $sub_category =  SubCategory::findOrFail($id);
        $sub_category->name = $request->name;
        $sub_category->slug = Str::slug($request->name);
        $sub_category->category_id = $request->category_id;
        $sub_category->created_by = auth()->user()->id;
        $sub_category->meta_title = $request->meta_title;
        $sub_category->meta_description = $request->meta_description;
        $sub_category->meta_keywords = $request->meta_keywords;
        $sub_category->status = $request->status;
        $sub_category->save();
        toastr()->success('Category created successfully');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function delete(string $id)
     {
         $sub_category = SubCategory::findOrFail($id);
         $sub_category->delete();
         toastr()->success('Category deleted successfully');
         return redirect()->route('admin.sub-category.index');
     }
    public function destroy(string $id)
    {
        //
    }
}
