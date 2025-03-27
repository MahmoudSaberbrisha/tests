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
        'entry_number2',
        'account_name',
        'account_name2',
        'account_number',
        'account_number2',
        'cost_center',
        'cost_center2',
        'reference',
        'reference2',
        'debit',
        'credit',
        'totel',
    ];

    public function chartOfAccount()
    {
        return $this->belongsTo(ChartOfAccount::class);
    }
}
