<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_class',
        'class_code',
    ];
}
