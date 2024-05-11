<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['permissionNama','permissionDesc'];
    protected $primaryKey = 'permissionCode';
    protected $table = 'Permissions';
    use HasFactory;
}
