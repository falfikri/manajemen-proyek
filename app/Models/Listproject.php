<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listproject extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'status',
        'start',
        'finish',
        'progres',
    ];
}
