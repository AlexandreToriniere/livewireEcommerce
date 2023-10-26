<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    public $product_id;

    public function deleteProduct($product_id)
    {
      
        $this->product_id = $product_id;
    }

    public function destroyProduct()
    {
       $product = Product::find($this->product_id);
       Storage::delete($product->image);
       $product->categories()->detach();
       $product->delete();
    }

    public function render()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.product.index',  compact('products'));
    }
}
