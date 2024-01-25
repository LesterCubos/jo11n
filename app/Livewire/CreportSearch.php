<?php

namespace App\Livewire;

use App\Models\Reports;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CreportSearch extends Component
{
    public $searchCreport='';
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
        $username = $user->name;
        return view('livewire.creport-search', [
            'reports' => Reports::where(function ($query) {
                $query->where('subject','like', "%{$this->searchCreport}%")
                ->orWhere('report_date','like', "%{$this->searchCreport}%");
            })->where('department', $userdept)
            ->orderBy('updated_at','desc')
            ->paginate(10),
            'currentDate' => Carbon::now()->format('Y-m-d'),
            'userdept' => $user->department,
            'username' => $user->name,
        ]);
    }
}
