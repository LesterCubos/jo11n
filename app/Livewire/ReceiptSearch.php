<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class ReceiptSearch extends Component
{
    public $searchReceipt='';
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
        return view('livewire.receipt-search', [
            'trans' => Transaction::where(function ($query) {
                $query->where('transNo','like', "%{$this->searchReceipt}%")
                ->orWhere('product_sku','like', "%{$this->searchReceipt}%")
                ->orWhere('product_name','like', "%{$this->searchReceipt}%")
                ->orWhere('product_category','like', "%{$this->searchReceipt}%")
                ->orWhere('transaction_type','like', "%{$this->searchReceipt}%");
            })->where('department', $userdept)
            ->orderBy('updated_at','desc')
            ->paginate(10),
        ]);
    }
}
