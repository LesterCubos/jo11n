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
            'expiries' => ReceiveIssue::where('psku','like', "%{$this->searchExpiry}%")
            ->orWhere('smrn','like', "%{$this->searchExpiry}%")
            ->orWhere('pname','like', "%{$this->searchExpiry}%")
            ->orderBy('updated_at','asc')
            ->whereNotNull('expiry_date')
            ->where('revstock', 0)
            ->paginate(10), 'removes' => RemmoveStock::all()
        ]);
    }
}
