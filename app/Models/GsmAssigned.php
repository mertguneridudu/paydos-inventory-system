<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GsmAssigned extends Model
{
    use HasFactory;

    protected $table = 'gsm_assigned';
    protected $primaryKey = 'gsm_assigned_id';
    protected $fillable = ['gsm_assigned_user', 'gsm_assigned_package_id', 'gsm_assigned_package_content_id', 'gsm_number', 'status'];
}