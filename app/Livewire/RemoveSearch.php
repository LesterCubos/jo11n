<?php

namespace App\Livewire;

use App\Models\RemmoveStock;
use Livewire\Component;
use Livewire\WithPagination;

class RemoveSearch extends Component
{
    public $searchRemove='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.remove-search', [
            'removes' => RemmoveStock::where('rsku','like', "%{$this->searchRemove}%")->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
