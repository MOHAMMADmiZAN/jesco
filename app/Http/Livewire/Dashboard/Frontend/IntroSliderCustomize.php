<?php

namespace App\Http\Livewire\Dashboard\Frontend;

use App\Models\intro_slide;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;

class IntroSliderCustomize extends Component
{
    use WithFileUploads;
    public bool $isShow = false;
    public  $intro_slide;
    public array $slide = [
        "sale" => '',
        'title' => '',
        'photo' => '',
    ];
    protected array $messages =[
        'slide.sale.required' => 'Sale Discount Must Be Required',
        'slide.sale.min' => 'Sale Discount Maximum 2 characters',
        'slide.title.required' => 'Sale title must be required',
        'slide.title.min' => 'Sale title Minimum 3 characters',
        'slide.photo.required' => 'Sale photo must be required',
        'slide.photo.image' => 'Sale photo must be Image Type',
        'slide.photo.max' => 'Sale photo Maximum 1024 Kilobyte'
    ];

    public function mount(){
        $this->intro_slide = new intro_slide;
    }
    public function resetFilters(): void

    {

        $this->reset('slide');





    }
    public function submit(){
        $this->validate(
            [
                 'slide.sale' => ['required','max:2'],
                'slide.title' => ['required','min:3'],
                'slide.photo' => ['required','image','max:1024']
            ]
        );
        $file_path = $this->slide['photo']->store('/intro_slide','public');

        $this->intro_slide->sale = $this->slide['sale'];
        $this->intro_slide->title = $this->slide['title'];
        $this->intro_slide->slide_image = $file_path;
        $success= $this->intro_slide->save();
        if ($success){
             session()->flash('alert', 'slide add Successfully');

         }else{
             session()->flash('error', 'slide add Decline');

         }


    }
    public function delete($id){
        $this->intro_slide->find($id)->delete();

        Session::flash('delete', ' Slide Deleted successfully');
    }
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.dashboard.frontend.intro-slider-customize',['slides'=>$this->intro_slide->all()]);
    }
}
