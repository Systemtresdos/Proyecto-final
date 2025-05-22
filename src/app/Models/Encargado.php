<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;

    protected $table = 'encargados';

    protected $fillable = [
        'dni',
        'usuario_id'
    ];
}
