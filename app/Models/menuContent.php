<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuContent extends Model
{
    protected $fillable = ['menuCode','menucontent'];
    protected $primaryKey = 'id';
    protected $table = 'menu_contents';
    use HasFactory;
}
