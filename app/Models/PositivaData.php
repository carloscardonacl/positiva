<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositivaData extends Model
{
    use HasFactory;
    protected $table = "Positiva_Data";
    protected $primaryKey = "Id_Positiva_Data";
    public $timestamps = false;
}
