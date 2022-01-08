<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;

class Index extends Component
{


    public function mount(): void
    {

    }



    public function render()
    {
        return view('livewire.frontend.index');
    }
}
