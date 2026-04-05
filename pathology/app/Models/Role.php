<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'PK_RoleID';

    protected $fillable = [
        'RoleName'
    ];

    public function users()
{
    return $this->hasMany(User::class, 'role_id', 'PK_RoleID');
}
}
