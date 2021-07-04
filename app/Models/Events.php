<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primaryKey = 'eventID';
    protected $connection = 'mysql';
    public $timestamps = false;
    protected $attributes = [
        'location' => '-',
    ];
    protected $casts = [

    ];
    protected $fillable = [
        'time',
        'place',
        'location',
        'description',
        'accountID',
        'title',
        'private'
    ];


}

