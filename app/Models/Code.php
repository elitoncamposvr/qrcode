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
        'class_id',
        'family_id',
        'group_id',
        'description',
    ];
}
