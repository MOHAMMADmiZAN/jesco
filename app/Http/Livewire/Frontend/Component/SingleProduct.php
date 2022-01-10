<?php

namespace App\Http\Livewire\Frontend\Component;

use Livewire\Component;

class SingleProduct extends Component
{
    public object $product;
    public function mount($product){
        $this->product = $product;
    }
    public function viewSingleProduct()
    {
        return redirect()->route('singleProductView',$this->product);
}
    public function render()
    {
        return view('livewire.frontend.component.single-product');
    }
}
