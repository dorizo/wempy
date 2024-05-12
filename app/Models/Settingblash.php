<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settingblash extends Model
{
    use HasFactory;
    
    protected $fillable = ['phone','apikey'];
    protected $primaryKey = 'blashCode';
    protected $table = 'settingblashes';
}
