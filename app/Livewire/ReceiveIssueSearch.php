<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ReceiveIssue;

class ReceiveIssueSearch extends Component
{
    public $searchRecieveIssue='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.receive-issue-search', [
            'receiveissues' => ReceiveIssue::where('psku','like', "%{$this->searchRecieveIssue}%")->orderBy('updated_at','desc')->paginate(10),
        ]);
    }
}