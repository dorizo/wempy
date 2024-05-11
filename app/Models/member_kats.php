<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_kats extends Model
{
    protected $fillable = ['memberkatName','memberkatdesc'];
    protected $primaryKey = 'id_member_kats';
    protected $table = 'member_kats';
}
