<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;

class Index extends Component
{
    public  $categories;







    public function render()
    {
        return view('livewire.frontend.index');
    }
}
