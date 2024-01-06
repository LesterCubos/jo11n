<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\ReceiveIssue;
use App\Models\Category;
use App\Models\Stock;

class SearchSMRN extends Component
{
    public $smrnSearch = '';
    public $showdiv = false;
         public $records;
     public $smrnDetails;

        // Fetch records
        public function searchResult(){

            if(!empty($this->smrnSearch)){
   
                $this->records = ReceiveIssue::orderby('smrn','asc')
                          ->select('*')
                          ->where('smrn','like','%'.$this->smrnSearch.'%')
                          ->where('movement', 'RECEIVED')
                          ->limit(10)
                          ->get();
   
                $this->showdiv = true;
            }else{
                $this->showdiv = false;
            }
        }

    // Fetch record by ID
    public function fetchsmrnDetail($id = 0){

        $record = ReceiveIssue::select('*')
                    ->where('id',$id)
                    ->first();

        $this->smrnSearch = $record->smrn;
        Session::put('thissmrn', $this->smrnSearch);
        $this->smrnDetails = $record;
        $this->showdiv = false;
    }
    public function render()
    {
        $stockMovement = new ReceiveIssue();
        $smrn = $stockMovement->generateStockMovementReferenceNo();
        $currentDate = Carbon::now()->format('Y-m-d');
        return view('livewire.search-s-m-r-n', compact('currentDate', 'smrn'));
    }
}
