<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Stock;

class StockSearch extends Component
{
    public $searchStock='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.stock-search', [
            'stocks' => stock::where('product_name','like', "%{$this->searchStock}%")->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
