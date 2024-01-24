<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Request;
use Illuminate\Support\Facades\Session;

class RequestStatus extends Component
{
    public $selectedStatus;
    public $options = ['Pending', 'Completed'];
    public function mount()
    {
        $reqNo = Session::get('reqNo');
        $requests = Request::where('reqNo', $reqNo)->get();
        foreach ($requests as $request) {
            $value = $request->status;
        }
        $this->selectedStatus = $value;
    }
    public function radioClicked($option)
    {
        // React to the radio button click here
        $this->selectedStatus = $option;

        $reqNo = Session::get('reqNo');
        $requests = Request::where('reqNo', $reqNo)->get();
        foreach ($requests as $request) {
            $request->status = $option;
            $request->save();
        }
    }
    public function render()
    {
        return view('livewire.request-status');
    }
}
