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

class CSearchSMRN extends Component
{
    public $smrnCsearch = '';
    public $showdiv = false;
         public $records;
     public $smrnDetails;

        // Fetch records
        public function searchResult(){

            if(!empty($this->smrnCsearch)){
                $user = Auth::user();
                $userdept = $user->department;
                $this->records = ReceiveIssue::orderby('smrn','asc')
                          ->select('*')
                          ->where('smrn','like','%'.$this->smrnCsearch.'%')
                          ->where('movement', 'RECEIVED')
                          ->where('department', $userdept)
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

        $this->smrnCsearch = $record->smrn;
        Session::put('thissmrn', $this->smrnCsearch);
        $this->smrnDetails = $record;
        $this->showdiv = false;
    }
    public function render()
    {
        $stockMovement = new ReceiveIssue();
        $smrn = $stockMovement->generateStockMovementReferenceNo();
        $currentDate = Carbon::now()->format('Y-m-d');
        return view('livewire.c-search-s-m-r-n', compact('currentDate', 'smrn'));
    }
}

