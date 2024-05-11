<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whatsapp_detail extends Model
{
    use HasFactory;
    
    protected $fillable = ['whatsappdetailstatus','memberCode','whatsappCode'];
    protected $primaryKey = 'whatsappdetailCode';
    protected $table = 'whatsapp_details';
}
