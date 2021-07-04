<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';
    protected $primaryKey = 'teamID';
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $attributes = [

    ];
    protected $casts = [

    ];
    protected $fillable = [
        'description',
        'accountID',
        'teamName',
        'isCompetitive',
        'points',
        'category',
        'image'
    ];
    public function members()
    {
        return $this->hasMany(TeamMembers::class);
    }
    public function member()
    {
        return $this->belongsTo('App\Models\TeamMembers');
    }
}
