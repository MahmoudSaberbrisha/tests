<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quod extends Model
{
    use HasFactory;

    protected $fillable = [
        // Define the fillable attributes here
        'attribute1',
        'attribute2',
        // Add other attributes as needed
    ];
}