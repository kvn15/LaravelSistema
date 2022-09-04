<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifications_id','identification','name','direccion',
        'emcargado','email','telefono','estado'
    ];
}
