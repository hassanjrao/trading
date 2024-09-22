<?php

namespace App\Http\Livewire;

use App\Models\Firm;
use Livewire\Component;

class ReviewReport extends Component
{

    public $search=null;
    public $firms=[];
    public $selectedFirm=null;

    

    public function updatedSearch()
    {
        if(!$this->search){
            $this->firms=[];
            return;
        }

        $firms = Firm::where('name', 'like', '%' . $this->search . '%')->get();

        $this->firms = $firms;
    }

    public function firmSelected($id)
    {
        $this->selectedFirm = Firm::find($id);

    }


    public function render()
    {
        return view('livewire.review-report');
    }
}
