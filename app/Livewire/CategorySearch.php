<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class CategorySearch extends Component
{
    public $searchCategory='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.category-search', [
            'categories' => Category::where('product_category','like', "%{$this->searchCategory}%")
            ->orWhere('department','like', "%{$this->searchCategory}%")
            ->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}
