<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CproductSearch extends Component
{
    public $searchCproduct='';
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
        return view('livewire.cproduct-search', [
            'products' => Product::where(function ($query) {
                $query->where('product_name','like', "%{$this->searchCproduct}%")
                ->orWhere('product_sku','like', "%{$this->searchCproduct}%")
                ->orWhere('product_category','like', "%{$this->searchCproduct}%");
            })->where('pdept', $userdept)
            ->orderBy('updated_at','desc')
            ->paginate(10),
        ]);
    }
}
