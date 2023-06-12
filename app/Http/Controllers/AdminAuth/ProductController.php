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
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('product_lists')->join('product_details', 'product_lists.id', '=', 'product_details.product_id')->whereNotIn('product_lists.service_type', ['service'])->get();
                // return view('admin.product.product_all', compact('products'));
                return view('admin.Pages.ProductManagement.product_all', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::orderBy('category_name', 'ASC')->get();
        return view('admin.Pages.ProductManagement.product_add', compact('category'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
                'title' => 'required|max:255',
                'slug' => 'required|max:255',
                'product_code' => 'required|max:255',
                'totalstock' => 'required',
                'image' => 'required|image|max:10000',
            ]
        );
        if ($validator->fails()) {  return response()->json(['errors'=>$validator->errors()]); }

        $productimageName = time().'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('upload/product/'.$request->title.'/Single_image'), $productimageName);

        $product_id = ProductList::insertGetId([
            'title' => $request->title,
            'slug' => $request->slug,
            'warrenty' => ($request->warrenty) ? $request->warrenty : null ,
            'product_code' => $request->product_code,
            'productremark' => ($request->remark) ? $request->remark : 'none' ,
            'totalstock' => $request->totalstock,
            'service_type' =>'Product',
            'category' => $request->category ?? $request->category,
            'subcategory' => $request->subcategory ?? $request->subcategory,
            'price' => $request->price,
            'special_price' => $request->special_price,
            'productfreature' =>($request->is_featured) ? true : false ,
            'status' =>$request->productstatus,
            'image' =>$product_imge,
        ]);


        if($request->hasFile('multiple_product_images')){
            $images=array();
            foreach($request->file('multiple_product_images') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path('upload/product/'.$request->title.'/mutliple'), $name);
                $imgData[] = $name;
            }
        }

        ProductDetails::insert([
            'product_id' => $product_id,
            'product_multiple_image' =>json_encode($imgData),
            'summary' =>strip_tags($request->summary),
        'description' =>strip_tags($request->description),
        'product_Features' =>strip_tags($request->product_Features)
        ]);
        return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Product Successfully Created",'redirct_url'=>route('admin.all.product')]);
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
        $product = \DB::table('product_lists') ->join('product_details', 'product_lists.id', '=', 'product_details.product_id')->whereNotIn('product_lists.service_type', ['service'])->where('product_id', '=', $id)->first();
      $category = Category::orderBy('category_name', 'ASC')->get();
      $subcategory = SubCategory::orderBy('subcategory_name', 'ASC')->get();
    //   dd($subcategory);
        return view('admin.Pages.ProductManagement.product_edit', compact('category', 'subcategory', 'product'));
    }
    public function loadSubCategories(Request $request){
        $parent_id = $request->catatgories_oid;
        $selected_category_name = $request->selected_category_name;
        $subcategories = Subcategory::where('category_id',$parent_id)->get()->toArray();
        // dd($selected_category_name);
        $option = ($selected_category_name) ? '<option>Select SubCategory</option>' : '<option selected>Select SubCategory</option>' ;
        foreach ($subcategories as $key => $value) {
            $selectde = ($value['subcategory_name'] ==$selected_category_name) ? 'selected' : '' ;
            $option.='<option value="'.$value['subcategory_name'].'" '.$selectde.'>'.$value['subcategory_name'].'</option>';
        }
        $option.='</option>';
       return  response()->json([
            'html' => $option
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request)

    {

        // dd($request->all());
        $validator = \Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'product_code' => 'required|max:255',
            'totalstock' => 'required',
        ]
    );

$product_id = $request->id;

    if ($validator->fails()) {  return response()->json(['errors'=>$validator->errors()]); }
    $product = \DB::table('product_lists') ->join('product_details', 'product_lists.id', '=', 'product_details.product_id')->where('product_id', '=',$request->id)->first();
    $peoduct_multiple_img = $product->product_multiple_image;
    $peoduct_single_img = $product->image;
    if($request->file('image') =='null' ||$request->file('image') ==null || $peoduct_single_img ==null){
        // dd('asdsadsa');
        $product_imge = $peoduct_single_img ;
    }else{
        $image_path1 = public_path('/upload/product/'.$request->title.'/Single_image'.$peoduct_single_img.'');
        if(\File::exists($image_path1)) {  \File::delete($image_path1); }
        $productimageName = time().'.'.$request->file('image')->extension();
        $request->file('image')->move(public_path('upload/product/'.$request->title.'/Single_image'), $productimageName);
        $product_imge = $productimageName ;
    }
  $pro_id =   ProductList::findOrFail($product_id)->update([
    'title' => $request->title,
    'slug' => $request->slug,
    'warrenty' => ($request->warrenty) ? $request->warrenty : null ,
    'product_code' => $request->product_code,
    'productremark' => ($request->remark) ? $request->remark : 'none' ,
    'totalstock' => $request->totalstock,
    'service_type' =>'Product',
    'category' => $request->category ?? $request->category,
    'subcategory' => $request->subcategory ?? $request->subcategory,
    'price' => $request->price,
    'special_price' => $request->special_price,
    'productfreature' =>($request->is_featured) ? true : false ,
    'status' =>$request->productstatus,
    'image' =>$product_imge,
]);

    if($request->file('multiple_product_images') =='null' ||$request->file('multiple_product_images') ==null || $peoduct_single_img ==null){
        $imgData[] = $peoduct_multiple_img ;
    }else{

foreach ($request->file('multiple_product_images') as $key => $multiple_product_images) {
    $productimageName = time().'.'.$multiple_product_images->extension();
    $multiple_product_images->move(public_path('upload/product/'.$request->title.'/mutliple'), $productimageName);
    $imgData[]  = $productimageName;
}

    }
    $matchTheseasd = ['product_id'=>$request->id];

    ProductDetails::updateOrCreate($matchTheseasd,[
        'product_multiple_image' =>json_encode($imgData),
        'summary' =>strip_tags($request->summary),
        'description' =>strip_tags($request->description),
        'product_Features' =>strip_tags($request->product_Features),
    ]);
    return response()->json(['code' => 200 ,  'status' =>'success', "message"=>"Product Successfully Updated",'redirct_url'=>route('admin.all.product')]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

      ProductList::findOrFail($id)->delete();
      ProductDetails::where('product_id', $id)->delete();
      return redirect()->route('admin.all.product')  ->with('success','Product Deletd Successfully');

    }




}
