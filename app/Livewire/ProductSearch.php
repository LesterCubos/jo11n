<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class ProductSearch extends Component
{
    public $searchProduct='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.product-search', [
            'products' => Product::where('product_name','like', "%{$this->searchProduct}%")
            ->orWhere('product_sku','like', "%{$this->searchProduct}%")
            ->orWhere('product_category','like', "%{$this->searchProduct}%")
            ->orderBy('updated_at','desc')->paginate(10),
            'categories' => Category::orderBy('updated_at', 'desc')->paginate(5)
        ]);
    }
}
