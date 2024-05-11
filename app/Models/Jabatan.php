<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $fillable = ['jabatanName','jabatanDesc','iuran'];
    protected $primaryKey = 'jabatanCode';
    protected $table = 'jabatans';
}
