<?php

namespace App\Livewire;

use App\Models\Reports;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportSearch extends Component
{
    public $searchReport='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.report-search', [
            'reports' => Reports::where('subject','like', "%{$this->searchReport}%")
                ->orWhere('report_date','like', "%{$this->searchReport}%")
                ->orWhere('department', "%{$this->searchReport}%")
                ->orWhere('reporter_name', "%{$this->searchReport}%")
                ->orderBy('updated_at','desc')
                ->paginate(10),
        ]);
    }
}
