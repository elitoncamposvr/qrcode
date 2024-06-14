<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'designer',
        'raw_code',
        'old_code',
        'class_id',
        'family_id',
        'group_id',
        'description',
    ];
}
