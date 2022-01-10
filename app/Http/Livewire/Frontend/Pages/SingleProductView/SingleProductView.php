<?php

namespace App\Http\Livewire\Frontend\Pages\SingleProductView;

use Livewire\Component;

class SingleProductView extends Component
{
    public function render()
    {
        return view('livewire.frontend.pages.single-product-view.single-product-view')->layout('layouts.frontend');
    }
}
