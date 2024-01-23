<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ReceiveIssueLog;
use Illuminate\Support\Facades\Auth;

class CReceiveIssueSearch extends Component
{
    public $searchCRecieveIssue='';
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
        return view('livewire.c-receive-issue-search', [
            'receiveissues' => ReceiveIssueLog::where('psku','like', "%{$this->searchCRecieveIssue}%")
            ->orWhere('pname','like', "%{$this->searchCRecieveIssue}%")
            ->orWhere('smrn','like', "%{$this->searchCRecieveIssue}%")
            ->orderBy('updated_at','desc')
            ->where('department', $userdept)
            ->paginate(10),
        ]);
    }
}
