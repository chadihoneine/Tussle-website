<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    //    protected $table = 'account';
//    protected $primaryKey = 'accountID';
//    protected $connection = 'mysql';
//    public $timestamps = false;
//
//    public function participateevent(){
//        return $this->hasMany(ParticipateEvents::class);
//    }
//
//    protected $attributes = [ // 0 for admin, 1 for user
//        'type' => 1,
////        'email',
////        'password',
////        'username',
////        'country',
////        'gender',
////        'bOD',
////        'ban',
////        'creationDate',
////        'f_name',
////        'l_name',
////        'city',
////        'image',
////        'about'
//    ];
//
//    protected $casts = [
//        //
//    ];
//
//    protected $fillable = [
//        'type',
//        'email',
//        'password',
//        'username',
//        'country',
//        'gender',
//        'bOD',
//        'ban',
//        'creationDate',
//        'f_name',
//        'l_name',
//        'city',
//        'image',
//        'about'
//    ];
}
