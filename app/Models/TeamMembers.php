<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    use HasFactory;

    protected $table = 'teammembers';
    protected $primaryKey = ['teamID', 'accountID'];
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $attributes = [
        'teamID',
        'accountID'
    ];
    protected $casts = [

    ];
    protected $fillable = [
        'teamID',
        'accountID'
    ];

//    public function team()
//    {
//        return $this->hasMany(Team::class);
//    }

//    public function account()
//    {
//        return $this->hasMany(Account::class);
//    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }
}
