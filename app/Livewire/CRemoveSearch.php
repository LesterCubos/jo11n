<?php

namespace App\Livewire;

use App\Models\RemmoveStock;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class CRemoveSearch extends Component
{
    public $searchCremove='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $user = Auth::user();
        $userdept = $user->department;
        return view('livewire.c-remove-search', [
            'removes' => RemmoveStock::where('rsku','like', "%{$this->searchCremove}%")->orderBy('updated_at','desc')
            ->where('rdept', $userdept)
            ->paginate(10),
        ]);
    }
}
