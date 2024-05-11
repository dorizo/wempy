<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_role extends Model
{
    
    protected $primaryKey = 'user_roleCode';
    protected $fillable = ['user_id','role_roleCode'];
    protected $table="user_roles";
    use HasFactory;
}
