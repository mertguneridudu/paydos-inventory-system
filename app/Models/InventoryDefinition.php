<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryDefinition extends Model
{
    use HasFactory;

    protected $table = 'inventory_definitions';
    protected $primaryKey = 'id';
    protected $fillable = ['feature_id', 'user_id', 'mac_address_ethernet', 'mac_address_wifi', 'status_info'];
}