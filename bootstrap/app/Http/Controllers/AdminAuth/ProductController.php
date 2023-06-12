<?php

namespace App\Http\Controllers\AdminAuth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductList;
use App\Models\Subcategory;
use App\Models\ProductDetails;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProductList::latest()->get();


        // dd($products);
        return view('admin.product.product_all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::orderBy('category_name', 'ASC')->get();
        return view('admin.product.product_add', compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                // 'required|max:255',
                'title' => 'required|max:255',
                'product_code' => 'required|max:255',
                'image' => 'required|image|max:10000',
                'short_description' => 'required|max:500',
                'long_description' => 'required|max:1000',
                'price' => 'required|numeric|max:1000',
                'special_price' => 'required|numeric|max:1000',
                'category' => 'required',
            ],
            [
                'title.required' => 'Product Title is required!',
                'title.max' => 'Product Title must not be greater than 255 characters.',
                'product_code.required'=>'Product Code is required!',
                'product_code.max'=>'Product Code must not be greater than 255 characters.',
                'image.required' => 'Product image is required!',
                'short_description.required' => 'Product Short Description is required!',
                'short_description.max' => 'Product Short Description must not be greater than 255 characters.',
                'long_description.required' => 'Product Long Description is required!',
                'long_description.max' => 'Product Long Description must not be greater than 1500 characters.',
                'category.required' => 'Product category is required!',
            ]
        );
        $productimageName = time().'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('upload/product/'.$request->title.'/Single_image'), $productimageName);
        $product_id = ProductList::insertGetId([
            'title' => $request->title,
            'price' => $request->price,
            'special_price' => $request->special_price,
            'category' => $request->category,
            'subcategory' => $request->subcategory,
            'remark' => $request->remark,
            'brand' => $request->brand,
            'product_code' => $request->product_code,
            'image' => $productimageName,
        ]);
        // dd($product_id);
        $image1 = time().'.'.$request->file('image_one')->extension();
        $image_two = time().'.'.$request->file('image_two')->extension();
        $image_three = time().'.'.$request->file('image_three')->extension();
        foreach (['image_one'=> $image1,'image_two'=>$image_two ,'image_three'=> $image_three] as $key => $value) {
        $request->file($key)->move(public_path('upload/product/'.$request->title.'/mutliple'), $image1);
        }

        ProductDetails::insert([
            'product_id' => $product_id,
            'image_one' => $image1,
            'image_two' => $image_two,
            'image_three' => $image_three,
            'short_description' => $request->short_description,
            'size' => $request->size,
            'color' => $request->color,
            'long_description' => $request->long_description,
        ]);
        return redirect()->route('admin.all.product')  ->with('success','Category Inserted Successfully');
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

    }
    public function loadSubCategories(Request $request){

        $parent_id = $request->catatgories_oid;
        $selected_category_name = $request->selected_category_name;
        $subcategories = Subcategory::where('category_id',$parent_id)->get()->toArray();
        $option=' <option selected>Select SubCategory';
        foreach ($subcategories as $key => $value) {
            $selectde = ($value['subcategory_name'] ==$selected_category_name) ? "selected" : '' ;
            $option.='<option value="'.$value['subcategory_name'].'" "'.$selectde.'">'.$value['subcategory_name'].'</option>';
        }
        $option.='</option>';
       return  response()->json([
            'html' => $option
        ]);

        // return);
        // ->with('subcategories')
        // ->get();
        // dd($subcategories);

    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request)

    {


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {



    }




}
