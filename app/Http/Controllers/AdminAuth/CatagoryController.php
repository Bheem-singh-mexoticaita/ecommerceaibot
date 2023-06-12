<?php

namespace App\Http\Controllers\AdminAuth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->get();
        // dd($category);
        // return view('admin.product.catagory.category_view', compact('category'));
        return view('admin.Pages.ProductManagement.catagory.category_view', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Pages.ProductManagement.catagory.category_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'category_name' => 'required|max:255',
            'category_image' => 'required|image|max:10000',
          ];
          $validator = Validator::make($request->all(), $rules);

  if ($validator->fails()) {
    $messages = $validator->messages();
    return Redirect::back()->withErrors($validator);

  }
  $imageName = time().'.'.$request->file('category_image')->extension();
  $request->file('category_image')->move(public_path('upload/category/'), $imageName);
  Category::insert([
    'category_name' => $request->category_name,
    'category_image' => $imageName,
]);
$notification = array(
    'message' => 'Category Inserted Successfully',
    'alert-type' => 'success',
);

    return redirect()->route('admin.all.category')  ->with('success','Category Inserted Successfully');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        // return view('admin.product.catagory.category_edit', compact('category'));
        return view('admin.Pages.ProductManagement.catagory.category_edit', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.Pages.ProductManagement.catagory.category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request)

    {
        $category_id = $request->id;


        if ($request->file('category_image')) {
        $rules = [
            'category_name' => 'required|max:255',
          ];

          $imageName = time().'.'.$request->file('category_image')->extension();
          $request->file('category_image')->move(public_path('upload/category/'), $imageName);

          Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'category_image' => $imageName,
        ]);

        $notification = array(
            'message' => 'Category and Image Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.all.category')->with($notification);
        }else{
            Category::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
            ]);
            return redirect()->route('admin.all.category')  ->with('success','Category Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('admin.all.category')  ->with('success','Category Deleted Successfully');
    }
}
