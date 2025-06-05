<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeamMember;

class Team extends Model
{
    use HasFactory;

    protected $primaryKey = 'team_id';

    protected $fillable = [
        'team_id',
        'team_name',
        'team_status'
    ];

    public function TeamsNumber(){

        return $this->hasMany(TeamMember::class, 'team_feature_id', 'team_id');

    }
}
