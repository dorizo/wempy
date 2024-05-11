<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    
    protected $fillable = ['nomorinduk','email','telp','nama_lengkap','jabatan_jabatanCode','user_id','id_member_kats'];
    protected $primaryKey = 'memberCode';
    protected $table = 'members';
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function jabatan() {
        return $this->belongsTo('App\Models\Jabatan');
    }
    
    public function userrole() {
        return $this->belongsTo('App\Models\Master\user_role' , 'user_id' ,'user_id');
    }
    public function memberkat() {
        return $this->belongsTo('App\Models\Master\member_kat' , 'id_member_kats' ,'id_member_kats');
    }
    
    use HasFactory;
    
}
