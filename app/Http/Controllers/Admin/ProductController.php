<?php

namespace App\Http\Controllers\Admin;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.create', compact('products', 'categories'));
    }

    public function store(ProductStoreRequest $request)
    {

        $image = $request->file('image')->store('public/products');

        $product = Product::create([
            'name'=>$request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'image' =>$image,
            'price' => $request->price,
            'quantity'=>$request->quantity,
            'meta_title'=> $request->meta_title,
            'meta_key'=> $request->meta_key,
            'meta_description' => $request->meta_description,
            'status' => $request->status == true ? '1':'0'
        ]);

        if($request->has('categories')){
            $product->categories()->attach($request->categories);
        }

        return to_route('admin.products.index')->with('success', 'Products created successfully');

    }

    public function edit(Product $product)
    {
        return view ('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $products)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required',
            'slug' => 'required',
            'price' =>'required',
            'quantity' =>'required',
            'meta_title' => 'required',
            'meta_key'=> 'required',
            'meta_description' => 'required',
            'status' => 'required',
        ]);

        $image = $products->image;
        if($request->hasFile('image')){
            Storage::delete($products->image);
            $image = $request->file('image')->store('public/products');
        }

        $products->update([
            'name'=>$request->name,
            'description'=> $request->description,
            'image' => $image,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'meta_title'=>$request->meta_title,
            'meta_key'=>$request->meta_key,
            'meta_description'=>$request->meta_description,
            'status'=>$request->status,
        ]);

        if($request->has('categories')){
            $products->categories()->sync($request->categories);
        }

        return to_route('admin.products.index')->with('Product edited successfully.');
    }

    public function destroy(Product $product)

    {
        Storage::delete($product->image);
        $product->categories()->detach();
        $product->delete();

        return to_route('admin.products.index')->with('danger', 'product deleted successfully.');
    }
}
