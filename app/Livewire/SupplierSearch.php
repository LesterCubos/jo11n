<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supplier;

class SupplierSearch extends Component
{
    public $searchSupplier='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.Supplier-search', [
            'suppliers' => Supplier::where('Supplier_name','like', "%{$this->searchSupplier}%")->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
