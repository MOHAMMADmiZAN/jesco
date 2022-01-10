<?php

namespace App\Http\Livewire\Frontend\Pages\Home\Section;

use App\Models\intro_slide;
use Livewire\Component;
use function view;

class IntroSlider extends Component
{
    public function render()
    {
        return view('livewire.frontend.pages.home.section.intro-slider',['slides'=>intro_slide::latest()->get()]);
    }
}
