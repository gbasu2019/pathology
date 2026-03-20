<?php

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Patient extends Model
{
    use Searchable;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'age',
        'gender',
        'address',
        'notes',
    ];

    protected $casts = [
        'name' => 'encrypted',
        'phone' => 'encrypted',
        'email' => 'encrypted',
        'address' => 'encrypted',
        'notes' => 'encrypted',
    ];

    public function toSearchableArray()
{
    return [
        'id' => $this->id,
        'name' => strtolower($this->name),
        'phone' => $this->phone,
        'email' => strtolower($this->email),
        'gender' => $this->gender,
    ];
}
}