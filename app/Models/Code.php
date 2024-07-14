<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'code',
        'designer',
        'class_code',
        'families_code',
        'group_code',
        'sequential_code',
        'description',
    ];
}
