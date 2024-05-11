<?php

namespace App\Models\Maseter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $primaryKey = 'RoleCode';
    protected $fillable = [
        'RoleCode',
        'RoleName',
        'RoleDesc',
        'PermissionCode',
    ];

}
