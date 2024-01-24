<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;

class CrequestSearch extends Component
{
    public $searchCrequest='';
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
        return view('livewire.crequest-search', [
            'reqs' => Request::where(function ($query) {
                $query->where('requester_name','like', "%{$this->searchCrequest}%")
                ->orWhere('product_sku','like', "%{$this->searchCrequest}%")
                ->orWhere('product_name','like', "%{$this->searchCrequest}%");
            })->where('department', $userdept)
            ->orderBy('updated_at','desc')
            ->paginate(10),
        ]);
    }
}
