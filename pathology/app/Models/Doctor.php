<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
protected $primaryKey = 'PK_DoctorID';   
protected $fillable = [
        'FK_UserID',
        'FirstName',
        'MiddleName',
        'LastName',
        'Specialization',
        'Qualification',
        'MobileNo',
        'AltContactNo',
        'PinCode',
        'City',
        'Address',
        'Address2',
        'DepartmentName',
        'ProfileImage'

    ];

    public function user()
    {
        return $this->belongsTo(User::class,'FK_UserID');
    }
}