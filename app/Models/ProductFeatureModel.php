<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeatureModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'feature_product_id';

    protected $fillable = [
        'feature_product_id',
        'product_id',
        'model_name',
        'seri_no',
        'imei_no',
        'notes',
        'status',
    ];
}
