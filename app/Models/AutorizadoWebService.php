<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorizadoWebService extends Model
{
    use HasFactory;
    protected $table = "Autorizados_Web_Services";
    protected $primaryKey = "Id_Autorizados_Web_Services";
    public $timestamps = false;
}
