<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;

use Livewire\Component;

class SearchRSKU extends Component
{
    public $rskuSearch = '';
    public $showdiv = false;
     public $records;
     public $skuDetails;

        // Fetch records
        public function searchResult(){

            if(!empty($this->rskuSearch)){
   
                $this->records = Product::orderby('product_sku','asc')
                          ->select('*')
                          ->where('product_sku','like','%'.$this->rskuSearch.'%')
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

        $this->rskuSearch = $record->product_sku;
        Session::put('thissku', $this->rskuSearch);
        $this->skuDetails = $record;
        $this->showdiv = false;
    }
    public function render()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $categories = Category::all();
        $user = Auth::user();
        $userdept = $user->department;
        $username = $user->name;
        $useremail = $user->email;
        $thissku = Session::get('thissku');
        $stock = Stock::where('stock_sku', $thissku)->first();
        return view('livewire.search-r-s-k-u', compact('currentDate', 'categories', 'stock', 'userdept', 'username', 'useremail'));
    }
}
