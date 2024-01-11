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
            'reorders' => Orders::where('orsku','like', "%{$this->searchReor}%")->orderBy('updated_at','desc')
            ->where('ortype', 'REORDER')
            ->paginate(10),
        ]);
    }
}
