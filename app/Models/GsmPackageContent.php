<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmPackageContent extends Model
{
    use HasFactory;

    protected $table = 'gsm_package_contents';
    protected $primaryKey = 'gsm_package_content_id';
    protected $fillable = ['gsm_package_contents_package_id', 'gsm_package_content_name', 'gsm_package_content_description'];
}