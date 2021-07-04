<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'answer';
    protected $primaryKey = 'answerID';
    protected $connection = 'mysql';
    public $timestamps = false;

    public function participateevent(){
        return $this->hasMany(Questions::class);
    }

    protected $attributes = [

    ];

    protected $casts = [

    ];

    protected $fillable = [
        'accountID',
        'questionID',
        'answerValue'
    ];
}
