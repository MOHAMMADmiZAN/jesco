<?php

namespace App\Http\Livewire\Frontend\Section;

use App\Models\Products;
use Livewire\Component;

class Newarrival extends Component
{
    public array $arr;
    public array $arr2;
    public mixed $products;
    public mixed $new_products;

    protected $listeners = ['test'];
    public function mount(): void
    {
        $this->products = Products::all();
        $this->new_products = Products::latest()->get();
        $this->arr = ['string','number','how'];

    }
    function test(){
        $this->arr2 = [...$this->arr];
        $this->dispatchBrowserEvent('test',['arr'=>$this->arr2]);
    }




    public function render()
    {
        return view('livewire.frontend.section.newarrival',['products'=>$this->products]);
    }
}
