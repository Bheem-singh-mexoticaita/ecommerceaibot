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

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$products = ProductList::latest()->get();
        $products = ProductList::latest()->where('service_type', 'service')->get();
        // dd($products);
        // return view('admin.service.service_all', compact('products'));
        return view('admin.Pages.ServiceManagement.service_all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::orderBy('category_name', 'ASC')->get();
        // return view('admin.service.service_add', compact('category'));
        return view('admin.Pages.ServiceManagement.service_add', compact('category'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd('dgfdhghg');
        $request->validate(
            [
                // 'required|max:255',
                'title' => 'required|max:255',
                'product_code' => 'required|max:255',
                'image' => 'required|image|max:10000',
                'short_description' => 'required|max:500',
                'long_description' => 'required|max:2000',
                'price' => 'required|numeric',
                'special_price' => 'required|numeric',
            ],
            [
                'title.required' => 'Service Title is required!',
                'title.max' => 'Service Title must not be greater than 255 characters.',
                'product_code.required'=>'Service Code is required!',
                'product_code.max'=>'Service Code must not be greater than 255 characters.',
                'image.required' => 'Service image is required!',
                'short_description.required' => 'Service Short Description is required!',
                'short_description.max' => 'Service Short Description must not be greater than 255 characters.',
                'long_description.required' => 'Service Long Description is required!',

            ]
        );
        $productimageName = time().'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('upload/product/'.$request->title.'/Single_image'), $productimageName);
        $product_id = ProductList::insertGetId([
            'title' => $request->title,
            'price' => $request->price,
            'special_price' => $request->special_price,
            'category' => 'service',
            'subcategory' => 'service',
            'slug' => $request->title,
            'product_code' => $request->title,
            'image' => $productimageName,
            'productfreature' => 0,
            'service_type' => 'service',
        ]);
        // dd($product_id);
        ProductDetails::insert([
            'product_id' => $product_id,
            'summary' =>strip_tags($request->short_description),
            'description' =>strip_tags($request->long_description),
        ]);

        return redirect()->route('admin.all.services')  ->with('success','Product Inserted Successfully');
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
       $details = \DB::table('product_lists') ->join('product_details', 'product_lists.id', '=', 'product_details.product_id')->where('product_id', '=', $id)->whereNotIn('product_lists.service_type', ['Product'])->first();
    return view('admin.Pages.ServiceManagement.service_edit', compact('details'));

    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request)

    {

       //dd( $request);

      $request->validate(
          [

              'title' => 'required|max:255',
              'product_code' => 'required|max:255',
              'short_description' => 'required|max:500',
              'long_description' => 'required|max:2000',
              'price' => 'required|numeric',
              'special_price' => 'required|numeric',

          ],
          [
              'title.required' => 'Service Title is required!',
              'title.max' => 'Service Title must not be greater than 255 characters.',
              'product_code.required'=>'Service Code is required!',
              'product_code.max'=>'Service Code must not be greater than 255 characters.',
              'image.required' => 'Service image is required!',
              'short_description.required' => 'Service Short Description is required!',
              'short_description.max' => 'Service Short Description must not be greater than 255 characters.',
              'long_description.required' => 'Service Long Description is required!',
          ]
      );
      $productid = $request->id;

    if ($request->file('image')) {
      $productimageName = time().'.'.$request->file('image')->extension();
      $request->file('image')->move(public_path('upload/product/'.$request->title.'/Single_image'), $productimageName);    }else{
    $productimageName = "";
    }
    $product = \DB::table('product_lists') ->join('product_details', 'product_lists.id', '=', 'product_details.product_id')->whereNotIn('product_lists.service_type', ['Product'])->where('product_id', '=',$request->id)->first();
    $peoduct_single_img = $product->image;
    if($request->file('image') =='null' ||$request->file('image') ==null || $peoduct_single_img ==null){
        $product_imge = $peoduct_single_img ;
    }else{
        $image_path1 = public_path('/upload/product/'.$request->title.'/Single_image'.$peoduct_single_img.'');
        if(\File::exists($image_path1)) {  \File::delete($image_path1); }
        $productimageName = time().'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('upload/product/'.$request->title.'/Single_image'), $productimageName);
        $product_imge = $productimageName ;
    }

    $product_id = ProductList::findOrFail($productid)->update([
        'title' => $request->title,
        'price' => $request->price,
        'special_price' => $request->special_price,
        'category' => 'service',
        'subcategory' => 'service',
        'slug' => $request->title,
        'product_code' => $request->title,
        'image' => $product_imge,
        'productfreature' => 0,
        'service_type' => 'service',
    ]);


      $subcategory_id = $request->id;
      $matchTheseasd = ['product_id'=>$subcategory_id];

      ProductDetails::updateOrCreate($matchTheseasd,[
        'summary' =>strip_tags($request->short_description),
        'description' =>strip_tags($request->long_description),
    ]);
      // ProductDetails::findOrFail($subcategory_id)->update([
      //       'product_id' => $productid,
      //       'product_multiple_image' =>json_encode($imgData),
      //       'short_description' => $request->short_description,
      //       'size' => $request->size,
      //       'color' => $request->color,
      //       'long_description' => $request->long_description,
      //   ]);
        return redirect()->route('admin.all.services')->with('success','Service Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

      ProductList::findOrFail($id)->delete();
      ProductDetails::where('product_id', $id)->delete();
      return redirect()->route('admin.all.service')  ->with('success','Product Deletd Successfully');

    }




}
