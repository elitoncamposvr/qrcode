<?php

namespace App\Livewire;

use App\Models\Code;
use Livewire\Component;

class CodeList extends Component
{

    public function render()
    {
        return view('livewire.codelist',[
            'codelist' => Code::paginate(10),
        ]);
    }
}
