<?php

namespace App\Livewire\Doctor;

use Livewire\Component;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    public $doctors;
    public $name, $email, $password;
    public $specialization, $qualification, $phone, $chamber_address;

    public $doctor_id;
    public $isEdit = false;
    
    public function render()
    {
        $this->doctors = Doctor::with('user')->latest()->get();

        return view('livewire.doctor.index');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        // Create user
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => 2 // Doctor role
        ]);

        // Create doctor
        Doctor::create([
            'user_id' => $user->id,
            'specialization' => $this->specialization,
            'qualification' => $this->qualification,
            'phone' => $this->phone,
            'chamber_address' => $this->chamber_address,
        ]);

        $this->resetForm();
    }

    public function edit($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);

        $this->doctor_id = $doctor->id;
        $this->name = $doctor->user->name;
        $this->email = $doctor->user->email;

        $this->specialization = $doctor->specialization;
        $this->qualification = $doctor->qualification;
        $this->phone = $doctor->phone;
        $this->chamber_address = $doctor->chamber_address;

        $this->isEdit = true;
    }

    public function update()
    {
        $doctor = Doctor::findOrFail($this->doctor_id);

        $doctor->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $doctor->update([
            'specialization' => $this->specialization,
            'qualification' => $this->qualification,
            'phone' => $this->phone,
            'chamber_address' => $this->chamber_address,
        ]);

        $this->resetForm();
    }

    public function delete($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->user->delete(); // cascade delete doctor
    }

    private function resetForm()
    {
        $this->reset([
            'name','email','password',
            'specialization','qualification','phone','chamber_address',
            'doctor_id','isEdit'
        ]);
    }
}
