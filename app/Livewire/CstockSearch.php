<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class CstockSearch extends Component
{
    public $searchCstock='';
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
        return view('livewire.cstock-search', [
            'stocks' => stock::where('product_name','like', "%{$this->searchCstock}%")->orderBy('updated_at','desc')
            ->where('dept', $userdept)
            ->paginate(10),
        ]);
    }
}
