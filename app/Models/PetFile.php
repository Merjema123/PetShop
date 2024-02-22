<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetFile extends Model
{
    public $timestamps=false;
    use HasFactory;

    protected $fillable=[
        'pet',
        'type',
        'file'
    ];
}
