<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipateEvents extends Model
{
    use HasFactory;
    protected $table = 'participateevent';
    protected $primaryKey = ['eventID', 'accountID'];
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $attributes = [

    ];
    protected $casts = [

    ];
    protected $fillable = [
            'eventID',
            'accountID'
        ];
    public function events(){
        return $this->hasMany(Events::class);
    }
    public function account(){
        return $this->hasMany(Account::class);
    }
}
