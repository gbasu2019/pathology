<?php

namespace App\Livewire\Doctor;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class Createdoctor extends Component
{
    use WithFileUploads;

    // User fields
    public $email, $password;

    // Doctor fields
    public $FirstName, $LastName, $MiddleName ,$MobileNo, $AltContactNo,$existingImage;
    public $Address, $Address2, $City, $PinCode;
    public $DepartmentName, $Specialization, $Qualification;
    public $doctor_id;
    public $isEdit = false;

    // Image
    public $ProfileImage;

    public function mount($id = null)
{
    if ($id) {
        $doctor = Doctor::with('user')->findOrFail($id);

        $this->doctor_id = $doctor->id;
        $this->isEdit = true;

        // user
        $this->email = $doctor->user->email;

        // doctor
        $this->FirstName = $doctor->FirstName;
        $this->LastName = $doctor->LastName;
        $this->MobileNo = $doctor->MobileNo;
        $this->AltContactNo = $doctor->AltContactNo;
        $this->Address = $doctor->Address;
        $this->Address2 = $doctor->Address2;
        $this->City = $doctor->City;
        $this->PinCode = $doctor->PinCode;
        $this->DepartmentName = $doctor->DepartmentName;
        $this->Specialization = $doctor->Specialization;
        $this->Qualification = $doctor->Qualification;
        $this->existingImage = $doctor->ProfileImage;
    }
}

    public function render()
    {
        return view('livewire.doctor.createdoctor');
    }

    public function store()
{
    $rules = [
        'FirstName' => 'required',
        'email' => 'required|email',
        'ProfileImage' => 'nullable|image|max:2048',
    ];

    if (!$this->isEdit) {
        $rules['email'] .= '|unique:users,email';
        $rules['password'] = 'required|min:6';
    }

    $this->validate($rules);

    // Upload image
    $imagePath = null;
    if ($this->ProfileImage) {
        $imagePath = $this->ProfileImage->store('doctors', 'public');
    }

    if ($this->isEdit) {

        $doctor = Doctor::with('user')->findOrFail($this->doctor_id);

        // update user
        $doctor->user->update([
            'name' => $this->FirstName . ' ' . $this->LastName,
            'email' => $this->email,
        ]);

        // update password only if given
        if ($this->password) {
            $doctor->user->update([
                'password' => Hash::make($this->password)
            ]);
        }

        // update doctor
        $doctor->update([
            'FirstName' => $this->FirstName,
            'LastName' => $this->LastName,
            'MobileNo' => $this->MobileNo,
            'AltContactNo' => $this->AltContactNo,
            'Address' => $this->Address,
            'Address2' => $this->Address2,
            'City' => $this->City,
            'PinCode' => $this->PinCode,
            'DepartmentName' => $this->DepartmentName,
            'Specialization' => $this->Specialization,
            'Qualification' => $this->Qualification,
            'ProfileImage' => $imagePath ?? $doctor->ProfileImage,
        ]);

        session()->flash('success', 'Doctor updated successfully');

    } else {

        // CREATE FLOW
        $user = User::create([
            'name' => $this->FirstName . ' ' . $this->LastName,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => 2
        ]);

        Doctor::create([
            'FK_UserID' => $user->id,
            'FirstName' => $this->FirstName,
            'LastName' => $this->LastName,
            'MobileNo' => $this->MobileNo,
            'AltContactNo' => $this->AltContactNo,
            'Address' => $this->Address,
            'Address2' => $this->Address2,
            'City' => $this->City,
            'PinCode' => $this->PinCode,
            'DepartmentName' => $this->DepartmentName,
            'Specialization' => $this->Specialization,
            'Qualification' => $this->Qualification,
            'ProfileImage' => $imagePath,
        ]);

        session()->flash('success', 'Doctor created successfully');
    }

    $this->reset();
}
}