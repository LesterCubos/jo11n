<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserSearch extends Component
{
    public $searchUser='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.user-search', [
            'users' => User::where('name','like', "%{$this->searchUser}%")->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
