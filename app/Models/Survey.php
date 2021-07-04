<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $table = 'survey';
    protected $primaryKey = 'surveyID';
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
        'startdate',
        'endDate'
    ];
}
