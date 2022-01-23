<?php

namespace App\Http\Livewire\Dashboard\Blog;

use Livewire\Component;

class BlogData extends Component
{
    public bool $isShow = false;
    public string $search = '';
    public string $num = "5";
    protected $queryString = ['search'];
    public array $blogData =[
        'title' => '',
        'description' =>'',
        'thumbnail' =>'',
        'tags' =>'',
    ];

    public function resetFilters(): void

    {

        $this->reset(['blogData']);


    }

//    public function updatingSearch()
//    {
//        $this->resetPage();
//    }

    public function submit(): void
    {
        $this->validate([
            'blogData.title' => 'required',
            'blogData.description' =>'required|min:100',
            'blogData.thumbnail' =>'required|image|max:1024',
            'blogData.tags' =>'required'

        ]);
    }
    public function render()
    {
        return view('livewire.dashboard.blog.blog-data',['blogs'=>'']);
    }
}
