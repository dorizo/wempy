<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission_role extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['id','role_RoleCode','permission_permissionCode'];
    protected $table="permission_role";
    public function permission() {
        return $this->belongsTo('App\Models\Permission');
    }
}
