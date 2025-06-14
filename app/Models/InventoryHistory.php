<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryHistory extends Model
{
    use HasFactory;

    protected $table = 'inventory_history';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'feature_product_id',
        'status_info',
    ];
}