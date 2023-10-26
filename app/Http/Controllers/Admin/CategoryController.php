<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
      
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view ('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {

        
        $image = $request->file('image')->store('public/categories');

        Category::create([
            'name'=>$request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'image' =>$image,
            'meta_title'=> $request->meta_title,
            'meta_key'=> $request->meta_key,
            'meta_description' => $request->meta_description, 
            'status' => $request->status == true ? '1':'0'
        ]);

        return to_route('admin.categories.index')->with('success', 'Category Created successfully');


    }

    public function edit(Category $category){
        return view ('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' =>'required',
            'description' =>'required',
        ]);

        $image = $category->image;
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/categories');
        }

        $category->update([
            'name'=>$request->name,
            'description'=> $request->description,
            'image' => $image,
        ]);

        return to_route('admin.categories.index')->with('Category edited successfully.');
    }

    public function destroy(Category $category)
    
    {
        Storage::delete($category->image);
        $category->product()->detach();
        $category->delete();

        return to_route('admin.categories.index')->with('danger', 'Category deleted successfully.');
    }
}
