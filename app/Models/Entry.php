<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'entry_number',
        'account_name',
        'account_number',
        'cost_center',
        'reference',
        'debit',
        'credit',
        'totel',
    ];
}
