<?php

namespace NamHuuNam\KeyAccessPackage\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_value',
    ];
}
