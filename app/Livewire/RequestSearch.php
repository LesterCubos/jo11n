<?php

namespace App\Livewire;

use App\Models\Request;
use Livewire\Component;
use Livewire\WithPagination;

class RequestSearch extends Component
{
    public $searchRequest='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.request-search', [
            'reqs' => Request::where('requester_name','like', "%{$this->searchRequest}%")
            ->orWhere('product_sku','like', "%{$this->searchRequest}%")
            ->orWhere('product_name','like', "%{$this->searchRequest}%")
            ->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
