<?php

namespace App\Http\Livewire\Frontend\Pages\Home\Section;

use App\Models\Category;
use App\Models\Products;
use Livewire\Component;
use function view;


class ProductView extends Component
{
    public mixed $products ;
    public string $in = 'all';
    public string $isActive = "all";
    public mixed $categories;



    public  function mount(): void
    {
        $this->categories = Category::all();
        $this->products = Products::all();
    }
    public function all_products(): void
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

    public function category_products($i): void
    {
        $this->in = $this->categories->find($i)->categoryName;
        $this->isActive = $this->in;
        $this->products = Products::whereCategoryId($i)->get();

    }
    public function render()
    {
        return view('livewire.frontend.pages.home.section.product-view');
    }
}
