<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'gsm_category_id';

    protected $fillable = [
        'gsm_category_id',
        'gsm_category_name',
    ];
}
