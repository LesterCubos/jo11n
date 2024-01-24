<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Orders;

class ReordersSearch extends Component
{
    public $searchReor='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.reorders-search', [
            'reorders' => Orders::where(function ($query) {
                $query->where('orsku','like', "%{$this->searchReor}%")
                      ->orWhere('orpname','like', "%{$this->searchReor}%")
                      ->orWhere('tron','like', "%{$this->searchReor}%");
            })->where('ortype', 'REORDER')
            ->orderBy('updated_at','desc')
            ->paginate(10),
        ]);
    }
}
