<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeatureModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'image',
        'position',
        'department',
        'team',
        'job_phone',
        'job_mail',
        'job_mail_pass',
        'private_phone',
        'private_mail',
        'language',
        'main_language',
        'country',
        'job_date',
        'birth_date',
        'bitrix_mail',
        'bitrix_mail_pass',
        'sonitel_username',
        'sonitel_pass',
        'shift',
        'address',
        'isActive',
        'anydesk_id',
        'anydesk_pass',
        'unvan'
    ];
}
