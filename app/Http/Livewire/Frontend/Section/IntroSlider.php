<?php

namespace App\Http\Livewire\Frontend\Section;

use App\Models\intro_slide;
use Livewire\Component;

class IntroSlider extends Component
{
    public function render()
    {
        return view('livewire.frontend.section.intro-slider',['slides'=>intro_slide::latest()->get()]);
    }
}
