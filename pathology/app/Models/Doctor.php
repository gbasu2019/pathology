<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'specialization',
        'qualification',
        'phone',
        'chamber_address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}