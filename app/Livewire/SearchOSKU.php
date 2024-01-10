<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use App\Models\Supplier;

class SearchOSKU extends Component
{
    public $oskuSearch = '';
    public $showdiv = false;
     public $records;
     public $skuDetails;

        // Fetch records
        public function searchResult(){

            if(!empty($this->oskuSearch)){
   
                $this->records = Product::orderby('product_sku','asc')
                          ->select('*')
                          ->where('product_sku','like','%'.$this->oskuSearch.'%')
                          ->limit(10)
                          ->get();
   
                $this->showdiv = true;
            }else{
                $this->showdiv = false;
            }
        }

    // Fetch record by ID
    public function fetchskuDetail($id = 0){

        $record = Product::select('*')
                    ->where('id',$id)
                    ->first();

        $this->oskuSearch = $record->product_sku;
        Session::put('thissku', $this->oskuSearch);
        $this->skuDetails = $record;
        $this->showdiv = false;
    }
    public function render()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $categories = Category::all();
        $suppliers = Supplier::all();
        $thissku = Session::get('thissku');
        $stock = Stock::where('stock_sku', $thissku)->first();
        return view('livewire.search-o-s-k-u', compact('currentDate', 'categories', 'stock', 'suppliers'));
    }
}
