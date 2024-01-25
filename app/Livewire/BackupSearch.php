<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BackupLog;

class BackupSearch extends Component
{
    public $searchBackup='';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.backup-search', [
            'backs' => BackupLog::where('file_name','like', "%{$this->searchBackup}%")
            ->orderBy('updated_at','asc')
            ->paginate(10),
        ]);
    }
}
