<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Orders;

class OrderSearch extends Component
{
    public $searchOrder='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.order-search', [
            'orders' => Orders::where('orsku','like', "%{$this->searchOrder}%")
            ->orWhere('tron','like', "%{$this->searchOrder}%")
            ->orWhere('orpname','like', "%{$this->searchOrder}%")
            ->orderBy('updated_at','desc')
            ->where('ortype', 'ORDER')
            ->paginate(10),
        ]);
    }
}
