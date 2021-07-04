<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $table = 'tournaments';
    protected $primaryKey = 'tournamentID';
    protected $connection = 'mysql';
    public $timestamps = false;

    /*public function participatetournament()
    {
        return $this->hasMany(ParticipateTournament::class);
    }*/

    protected $attributes = [
        'accountID',
        'category',
        'location',
        'time',
        'place',
        'duration',
        'description',
        'isdeleted',
        'issolo',
        'tournamentscol',
        'title',
        'nbOfParticipants'
    ];

    protected $casts = [
        //
    ];

    protected $fillable = [
        'accountID',
        'category',
        'location',
        'time',
        'place',
        'duration',
        'description',
        'isdeleted',
        'issolo',
        'tournamentscol',
        'title',
        'nbOfParticipants'
    ];
}
