<?php

namespace App\Http\Livewire\Frontend\Pages\Home\Section;

use App\Models\Products;
use Livewire\Component;
use function view;

class Newarrival extends Component
{
    public array $arr;
    public array $arr2;
    public mixed $products;
    public mixed $new_products;


    public function mount(): void
    {
        $this->products = Products::all();
        $this->new_products = Products::latest()->get();
        $this->arr = ['string','number','how'];

    }



    public function render()
    {
        return view('livewire.frontend.pages.home.section.newarrival',['products'=>$this->products]);
    }




}
