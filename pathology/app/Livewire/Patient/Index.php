<?php

namespace App\Livewire\Patient;

use Livewire\Component;
use App\Models\Patient;

class Index extends Component
{
    public $search = '';
    public $field = 'all'; // name, email, phone, all


     public function searchdata($data)
    {
    $this->search=$data;
    if(!empty($data)){

     if ($this->field === 'name') {
            $patients = Patient::search($this->search)
                ->get();

        } elseif ($this->field === 'email') {
            $patients = Patient::search($this->search)
                ->get();

        } elseif ($this->field === 'phone') {
            $patients = Patient::search($this->search)
                ->get();

        } else {
            // global search
            $patients = Patient::search($this->search)->get();
        }

    }else{
         $patients = Patient::latest()->limit(10)->get();
    }
    }

    public function render()
{
    if (!$this->search) {
        $patients = Patient::latest()->limit(10)->get();
    } else {

        if ($this->field === 'name') {
            $patients = Patient::search($this->search)
                ->get();

        } elseif ($this->field === 'email') {
            $patients = Patient::search($this->search)
                ->get();

        } elseif ($this->field === 'phone') {
            $patients = Patient::search($this->search)
                ->get();

        } else {
            // global search
            $patients = Patient::search($this->search)->get();
        }
    }

    return view('livewire.patient.index', [
        'patients' => $patients
    ]);
}
}