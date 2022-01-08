<?php

namespace App\Http\Livewire\Dashboard\Category;


use App\Models\Category;
use App\Models\Products;
use App\Models\SubCategory;
use App\Models\User;
use Auth;
use File;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Session;


class Categories extends Component
{
    use WithFileUploads;
    use WithPagination;

    public array $categoryData =[
        'name' => '',
        'photo' => '',

    ];

    public $c = '';
    public $search = '';
    public $num = 5;

    protected $queryString = ['search'];


    protected array $rules = [
        'categoryData.name' => 'required|min:4',
        'categoryData.photo' => 'required|image|max:500',
    ];
    protected array $messages = [
        'categoryData.name.required' => 'Category name must be Required',
        'categoryData.name.min' => 'Category name must be at least 4 characters',
        'categoryData.name.unique' => 'This Category Already Exists',
        'categoryData.photo.required' => 'Category photo must be required',
        'categoryData.photo.image' => 'Category photo must be image',
        'categoryData.photo.max' => 'Category photo must be under 500 kilobytes',
    ];
    public bool $isShow = false;
    public function mount(): void
    {
        $this->c=   collect($this->categoryData);



    }
    public function resetFilters(): void

    {

        $this->reset('categoryData');



    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }
    public function submit()
    {

        $this->validate(
            [
                'categoryData.name'=> Rule::unique('categories','categoryName')

            ]
        );
        $file_path = $this->categoryData['photo']->store(auth()->user()->name.'/categoryPhoto','public');

        $success = Category::create([
             'categoryName'=> $this->categoryData['name'],
             'AddedBy'=>Auth::user()->id,
             'categoryPhotoUrl'=>  $file_path
         ]);

      if ($success){
          Session::flash('alert', 'Category  Added successfully');
      }else{
          Session::flash('error', 'Category  Decline');
      }
    }

    public function delete($id){
        Category::find($id)->delete();
      $sub=  SubCategory::whereCategoryId($id)->get();
       foreach ($sub as $s){
           $s->delete();
       }
        Session::flash('delete', 'Category And Related SubCategory Deleted successfully');
    }

    public function render()
    {
        return view('livewire.dashboard.category.categories',['category'=>Category::where('categoryName','like','%'.$this->search.'%')->latest()->paginate($this->num),
            'user'=>User::paginate($this->num)
            ])->layout('layouts.app');
    }
}
