<?php

namespace App\Http\Livewire\Frontend\Section;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;


class ProductView extends Component
{
    public $p = '' ;
    public $products ;
    public $in = 'all';
    public $isActive = "all";
    public $categories;



    public  function mount(){
        $this->categories = Category::all();
        $this->products = Products::all();
    }
    public function all_products()
    {
        $this->products = Products::all();
        $this->isActive = 'all';
    }

    public function new_product(): void
    {
        $this->in = 'new';
        $this->isActive = $this->in;
        $this->products = Products::latest()->get();
    }

    public function category_products($i)
    {
        $this->in = $this->categories->find($i)->categoryName;
        $this->isActive = $this->in;
        $this->products = Products::where('category_id','=',$i)->get();

    }
    public function render()
    {
        return view('livewire.frontend.section.product-view');
    }
}
