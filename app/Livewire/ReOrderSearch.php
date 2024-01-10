<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Stock;
use App\Models\Product;

class ReOrderSearch extends Component
{
    public $searchReOrder='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.re-order-search', [
            'reorders' => Stock::where('stock_sku','like', "%{$this->searchReOrder}%")->orderBy('updated_at','desc')
            ->where('availability', 'Low Stock')
            ->paginate(10),
            'products' => Product::all(),
        ]);
    }
}
