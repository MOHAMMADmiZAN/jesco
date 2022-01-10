<?php

namespace App\Http\Livewire\Frontend\Pages\SingleProductView;

use App\Models\Product_thumbnail;
use App\Models\Products;
use Livewire\Component;

class SingleProductView extends Component
{
    public object $productData;
    public object $productThumbnail;


    public function mount($product){
        $this->productData = Products::findOrFail($product);
        $this->productThumbnail =Product_thumbnail::whereProductId($product)->get();
    }
    public function render()
    {
        return view('livewire.frontend.pages.single-product-view.single-product-view')->layout('layouts.frontend');
    }
}
