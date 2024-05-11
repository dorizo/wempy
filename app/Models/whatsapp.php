<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whatsapp extends Model
{
    use HasFactory;
    protected $fillable = ['whatsappName','WhatsappDesc'];
    protected $primaryKey = 'whatsappCode';
    protected $table = 'whatsapps';
}
