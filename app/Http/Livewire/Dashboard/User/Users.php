<?php

namespace App\Http\Livewire\Dashboard\User;

use App\Models\User;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Session;

class Users extends Component
{

    use WithPagination;
    public string $search = '';
    protected $queryString = ['search'];
    public string $userName ;
    public string $title = 'User Page';


    public function updatingSearch(): void
    {
        $this->resetPage();

    }

    public function delete($userId): void
    {
        User::findOrFail($userId)->delete();
        Session::flash('alert', 'User Delete Successfully');

    }

    public function render()
    {
        return view('livewire.dashboard.user.users',['users'=>User::where('name', 'like', '%'.$this->search.'%')->where('id','!=',Auth::user()->id)->latest()->paginate(10)]);
    }
}
