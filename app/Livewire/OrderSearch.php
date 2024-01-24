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
            'orders' => Orders::where(function ($query) {
                $query->where('orsku','like', "%{$this->searchOrder}%")
                ->orWhere('tron','like', "%{$this->searchOrder}%")
                ->orWhere('orpname','like', "%{$this->searchOrder}%");
            })->where('ortype', 'ORDER')
            ->orWhere('ortype', 'REQUEST ORDER')
            ->orderBy('updated_at','desc')
            ->paginate(10),
        ]);
    }
}
