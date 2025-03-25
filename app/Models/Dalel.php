<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dalel extends Model
{
    use HasFactory;

    protected $table = 'dalel'; // Specify the table name

    protected $fillable = [
        // Define the fillable attributes here
        'attribute1',
        'attribute2',
        // Add other attributes as needed
    ];
}