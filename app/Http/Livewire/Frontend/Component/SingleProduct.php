<?php

namespace App\Http\Livewire\Frontend\Component;

use Livewire\Component;

class SingleProduct extends Component
{
    public object $product;
    public function mount($product){
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.component.single-product');
    }
}
