<?php

namespace App\Http\Livewire\Frontend\Component;

use App\Models\Products;
use Livewire\Component;

class SingleProduct extends Component
{

    public mixed $products;
    public mixed $new_products;
    public function mount(): void
    {
        $this->products = Products::all();
        $this->new_products = Products::latest()->get();

    }



    public function render()
    {
        return view('livewire.frontend.component.single-product',['products'=>$this->products]);
    }
}
