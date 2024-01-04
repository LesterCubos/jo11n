<?php

namespace App\Livewire;
use Livewire\WithPagination;
use App\Models\ReceiveIssue;
use App\Models\RemmoveStock;

use Livewire\Component;

class ExpirySearch extends Component
{
    public $searchExpiry='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.expiry-search', [
            'expiries' => ReceiveIssue::where('psku','like', "%{$this->searchExpiry}%")->orderBy('updated_at','desc')
            ->whereNotNull('expiry_date')
            ->paginate(10), 'removes' => RemmoveStock::all()
        ]);
    }
}
