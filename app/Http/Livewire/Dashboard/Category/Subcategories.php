<?php

namespace App\Http\Livewire\Dashboard\Category;


use App\Models\Category;
use App\Models\SubCategory;
use Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Session;

class Subcategories extends Component
{

    use WithPagination;

    public array $subcategoryData =[
        'name' => '',
         'category'=>''

    ];

    public $search = '';
    public $num = 5;
    public $category ;
    public $subcategories;
    protected $queryString = ['search'];
    public bool $isShow = false;

    protected $messages = [
        'subcategoryData.name.required' => 'Category name must be Required',
        'subcategoryData.name.min' => 'Category name must be at least 3 characters',
        'subcategoryData.name.unique' => 'This Sub-Category Already Exists',
        'subcategoryData.category.required' => 'Category name must be required',

    ];

    public function mount(){
        $this->category = Category::all();
        $this->subcategories = new SubCategory();
    }

    public function resetFilters(): void

    {

        $this->reset('subcategoryData');



    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }


    public function submit(): void
    {
        $this->validate(
            [
                'subcategoryData.name'=> [Rule::unique('sub_categories','sub_category_name'),'required','min:3'],
                'subcategoryData.category' => ['required'],

            ]
        );
        $success =     SubCategory::create([
            'sub_category_name'=>$this->subcategoryData['name'],
            'category_id'=>$this->subcategoryData['category'],
            'user_id'=>Auth::user()->id
        ]);



    if ($success){
        session()->flash('alert',' SubCategory Added Successfully');
    }else{
        session()->flash('error',' SubCategory decline ');
    }







    }
    public function delete($id){
        SubCategory::find($id)->delete();
        Session::flash('delete', ' SubCategory Deleted successfully');
    }


    public function render()
    {
        return view('livewire.dashboard.category.subcategories',['subcategory'=>SubCategory::where('sub_category_name','like','%'.$this->search.'%')->latest()->paginate($this->num)]);
    }
}
