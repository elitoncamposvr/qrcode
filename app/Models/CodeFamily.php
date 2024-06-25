<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeFamily extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_family',
        'families_code',
    ];
}
