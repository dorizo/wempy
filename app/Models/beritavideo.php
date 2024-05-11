<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beritavideo extends Model
{
    use HasFactory;
    protected $fillable = ['beritakatCode','judul','link','slug','isi','publish','creator'];
    protected $primaryKey = 'beritavideoCode';
    protected $table = 'beritavideos';
}
