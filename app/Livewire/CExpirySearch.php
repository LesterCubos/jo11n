<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ReceiveIssue;
use App\Models\RemmoveStock;
use Illuminate\Support\Facades\Auth;

class CExpirySearch extends Component
{
    public $searchCexpiry='';
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
        return view('livewire.c-expiry-search', [
            'expiries' => ReceiveIssue::where(function ($query) {
                $query->where('psku','like', "%{$this->searchCexpiry}%")
                ->orWhere('smrn','like', "%{$this->searchCexpiry}%")
                ->orWhere('pname','like', "%{$this->searchCexpiry}%");
            })->whereNotNull('expiry_date')
            ->where('department', $userdept)
            ->orderBy('updated_at','desc')
            ->paginate(10), 
            'removes' => RemmoveStock::all()
        ]);
    }
}
