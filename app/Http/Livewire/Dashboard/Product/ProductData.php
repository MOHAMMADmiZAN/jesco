<?php

namespace App\Http\Livewire\Dashboard\Product;


use App\Models\Category;
use App\Models\Product_thumbnail;
use App\Models\Products;
use App\Models\SubCategory;
use Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Session;

class ProductData extends Component
{
    use WithFileUploads;
    use WithPagination;


    public bool $isShow = false;
    public string $search = '';
    public string $num = "5";
    protected $queryString = ['search'];
    public $category = [];
    public $subcategory = [];
    public $product_thumbnail = [];
    public Products $products;



    public array $productData = [
        'name' => '',
        'category' => '',
        'subcategory' => '',
        'unit_price' => '',
        'quantity' => '',
        'user_id' => '',
        'image' => '',
        'description' => '',
        'information'=> ''
    ];

    protected $validationAttributes = [
        'productData.name' => 'Name',
        'productData.category' => 'Category',
        'productData.subcategory' => 'Subcategory',
        'productData.unit_price' => 'UnitPrice',
        'productData.quantity' => 'Quantity',
        'productData.user_id' => 'User',
        'productData.image' => 'Product Image',
        'productData.information' => 'Information',
        'productData.description' => 'Description',
    ];

    public function mount(): void
    {
        $this->category = Category::orderBy('categoryName')->get();
        $this->products = new Products();


    }

    public function subcategory_data(): void
    {
        $this->subcategory = SubCategory::whereCategoryId($this->productData['category'])->orderBy('sub_category_name')->get();

    }

    public function resetFilters(): void

    {

        $this->reset(['productData', 'product_thumbnail']);


    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function submit(): void
    {
        $this->validate(
            [
                'productData.name' => ['required', Rule::unique('products', 'name')],
                'productData.category' => ['required'],
                'productData.subcategory' => ['required'],
                'productData.unit_price' => ['required'],
                'productData.quantity' => ['required'],
                'productData.description' => ['required','min:100'],
                'productData.information' => ['required'],
                'productData.image' => ['image', 'max:1024', 'required'],
                'product_thumbnail.*' => ['image', 'max:1024'],

            ]
        );
        $file_path = $this->productData['image']->store(auth()->user()->name . '/productPhoto', 'public');

     $k=   Products::create(
            [
               'name'=> $this->productData['name'],
                'category_id'=> $this->productData['category'],
                'sub_category_id'=>$this->productData['subcategory'] ?? null,
                'unit_price'=>$this->productData['unit_price'],
                'quantity' => $this->productData['quantity'],
                'user_id' => Auth::id(),
                'image_url'=>$file_path,
                'description'=>$this->productData['description'],
                'information'=>$this->productData['information']


            ]
        );









        $lastId = $k->id;
        if ($this->product_thumbnail && $lastId) {
            foreach ($this->product_thumbnail as $thumbnail) {
                $thumbnail_path = $thumbnail->store(auth()->user()->name . '/product_thumbnail', 'public');
                Product_thumbnail::create(
                    [
                        'product_id' => $lastId,
                        'product_thumbnail_url' => $thumbnail_path
                    ]
                );


            }

        }
        if ($k) {
            Session::flash('alert', 'Products  Added successfully');
        } else {
            Session::flash('error', 'Products  Decline');
        }


    }

    public function delete($id)
    {
        Products::findOrFail($id)->delete();
        Session::flash('delete', 'Category And Related SubCategory Deleted successfully');
    }

    public function render()
    {
        return view('livewire.dashboard.product.product-data', ['product_data' => Products::where('name', 'like', '%' . $this->search . '%')->latest()->paginate($this->num)]);
    }
}
