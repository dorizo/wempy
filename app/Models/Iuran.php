<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use HasFactory;
    protected $fillable = ['iuranDesc','tahun','bulan'];
    protected $primaryKey = 'iuranCode';
    protected $table = 'iurans';
}
