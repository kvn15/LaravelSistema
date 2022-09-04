<?php

namespace App\Models;

use Faker\Provider\es_PE\Person\ClientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'last_name', 'identifications_id', 'identification', 'email', 'telefono', 'direccion'
    ];
}
