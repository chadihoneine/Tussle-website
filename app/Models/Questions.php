<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $primaryKey = 'questionID';
    protected $connection = 'mysql';
    public $timestamps = false;

    public function participateevent(){
        return $this->hasMany(Answer::class);
    }

    protected $attributes = [

    ];

    protected $casts = [

    ];

    protected $fillable = [
        'surveyID',
        'choices',
        'question'
    ];
}
