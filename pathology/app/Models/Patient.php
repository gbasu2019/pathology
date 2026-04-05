<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Crypt;

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

//     public function toSearchableArray()
// {
//     return [
//         'id' => $this->id,
//         'name' => strtolower($this->name),
//         'phone' => $this->phone,
//         'email' => strtolower($this->email),
//         'gender' => $this->gender,
//     ];
// }

public function toSearchableArray()
{
    return [
        'id' => $this->id,

        // separate searchable fields
        'name_search' => strtolower($this->name),
        'email_search' => strtolower($this->email),
        'phone_search' => $this->phone,

        // optional global search
        'all_search' => strtolower(
            $this->name . ' ' . $this->email . ' ' . $this->phone
        ),

        'gender' => $this->gender,
    ];
}

public function getDecryptedAttribute($value)
{
    try {
        return Crypt::decryptString($value);
    } catch (\Exception $e) {
        return $value; // already decrypted or invalid
    }
}
public function toArray()
{
    $array = parent::toArray();

    foreach (['name','phone','email','address','notes'] as $field) {
        try {
            $array[$field] = \Crypt::decryptString($array[$field]);
        } catch (\Exception $e) {}
    }

    return $array;
}
}