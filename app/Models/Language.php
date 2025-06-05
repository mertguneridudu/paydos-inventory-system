<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $primaryKey = 'country_id';

    protected $fillable = [
        'country_code',
        'country_title',
        'language_status',
    ];
}
