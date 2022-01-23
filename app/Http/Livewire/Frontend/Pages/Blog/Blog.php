<?php

namespace App\Http\Livewire\Frontend\Pages\Blog;

use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        return view('livewire.frontend.pages.blog.blog')->layout('layouts.frontend',['title' => 'Blog']);
    }
}
