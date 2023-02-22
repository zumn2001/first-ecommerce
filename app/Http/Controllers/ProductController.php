<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.products.create',compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'model' => 'required',
            'stock' => 'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'tag_id'=>'required',
            'image1'=>'required',

        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->price =  $request->price;
        $product->description = $request->description;
        $product->model = $request->model;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->tag_id = $request->tag_id;
        $product->discount = $request->discount;
         
        $filename = time()."_".$request->file('image1')->getClientOriginalName();
        $request->file('image1')->move(public_path('image'), $filename);
        $product->image1 = $filename;
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}