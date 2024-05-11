<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iuran_member extends Model
{
    use HasFactory;
    protected $fillable = ['memberCode','iuranCode','total','creator'];
    protected $primaryKey = 'iuran_membersCode';
    protected $table = 'iuran_members';
    
    public function member() {
        return $this->belongsTo('App\Models\member' , 'memberCode' ,'memberCode');
    }
}
