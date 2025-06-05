<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmPackage extends Model
{
    use HasFactory;

    protected $table = 'gsm_packages';
    protected $primaryKey = 'gsm_package_id';
    protected $fillable = ['gsm_package_name', 'gsm_package_description'];
}