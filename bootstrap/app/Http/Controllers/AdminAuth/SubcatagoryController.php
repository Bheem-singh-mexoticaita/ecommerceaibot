<?php

namespace App\Http\Controllers\AdminAuth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Image;
class SubcatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $subcategory = SubCategory::latest()->get();
        return view('admin.product.subcatagory.subcategory_view', compact('subcategory'));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::latest()->get();
        return view('admin.product.subcatagory.subcategory_add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'category_name' => 'required',
                'subcategory_name' => 'required',
            ],
            [
                'category_name.required' => 'Category Name is required!',
                'subcategory_name.required' => 'SubCategory Name is required!',
            ]
        );

        Subcategory::insert([
            'category_id' => $request->category_id,
            'category_name' => $request->category_name,
            'subcategory_name' => $request->subcategory_name,
        ]);
        return redirect()->route('admin.all.subcategory')  ->with('success','Sub Category Inserted Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::orderBy('category_name', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.product.subcatagory.subcategory_edit', compact('category', 'subcategory'));

    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request)

    {
        $request->validate(
            [
                'category_name' => 'required',
                'subcategory_name' => 'required',
            ],
            [
                'category_name.required' => 'Category Name is required!',
                'subcategory_name.required' => 'SubCategory Name is required!',
            ]
        );
        $subcategory_id = $request->id;
        Subcategory::findOrFail($subcategory_id)->update([
            'category_name' => $request->category_name,
            'subcategory_name' => $request->subcategory_name,
        ]);
        return redirect()->route('admin.all.subcategory')  ->with('success','Sub Category Update  Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubCategory::findOrFail($id)->delete();
        return redirect()->route('admin.all.subcategory')  ->with('success','Category Deleted Successfully');



    }
}
