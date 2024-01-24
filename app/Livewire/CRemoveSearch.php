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
            'removes' => RemmoveStock::where(function ($query) {
                $query->where('rsku','like', "%{$this->searchCremove}%")
                ->orWhere('rsmrn','like', "%{$this->searchCremove}%")
                ->orWhere('rname','like', "%{$this->searchCremove}%");
            })->where('rdept', $userdept)
            ->orderBy('updated_at','desc')
            ->paginate(10),
        ]);
    }
}
