<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class TransactionSearch extends Component
{
    public $searchTrans='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.transaction-search', [
            'trans' => Transaction::where('transNo','like', "%{$this->searchTrans}%")
            ->orWhere('product_sku','like', "%{$this->searchTrans}%")
            ->orWhere('product_name','like', "%{$this->searchTrans}%")
            ->orWhere('product_category','like', "%{$this->searchTrans}%")
            ->orWhere('department','like', "%{$this->searchTrans}%")
            ->orWhere('transaction_type','like', "%{$this->searchTrans}%")
            ->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
