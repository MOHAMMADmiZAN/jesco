<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.frontend.pages.index');
    }
}
