<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $primaryKey = 'team_member_id';

    protected $fillable = [
        'team_member_id',
        'team_member',
        'team_feature_id',
        'member_status'
    ];

    public function Teams(){

        //return $this->hasMany(TeamMember::class, 'team_feature_id', 'team_id');
        return $this->belongsTo(Teams::class, 'team_id', 'team_feature_id');


    }
}
