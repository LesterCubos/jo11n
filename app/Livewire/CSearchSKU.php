<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\ReceiveIssue;
use App\Models\Category;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class CSearchSKU extends Component
{
    public $cskuSearch = '';
    public $showdiv = false;
     public $records;
     public $skuDetails;

        // Fetch records
        public function searchResult(){

            if(!empty($this->cskuSearch)){
                $user = Auth::user();
                $userdept = $user->department;
                $this->records = Product::orderby('product_sku','asc')
                          ->select('*')
                          ->where('product_sku','like','%'.$this->cskuSearch.'%')
                          ->where('pdept', $userdept)
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

        $this->cskuSearch = $record->product_sku;
        Session::put('thissku', $this->cskuSearch);
        $this->skuDetails = $record;
        $this->showdiv = false;
    }
    public function render()
    {
        $stockMovement = new ReceiveIssue();
        $smrn = $stockMovement->generateStockMovementReferenceNo();
        $currentDate = Carbon::now()->format('Y-m-d');
        $categories = Category::all();
        $route = Session::get('route');
        $thissku = Session::get('thissku');
        $stock = Stock::where('stock_sku', $thissku)->first();
        return view('livewire.c-search-s-k-u', compact('currentDate', 'smrn', 'categories', 'route', 'stock'));
    }
}
