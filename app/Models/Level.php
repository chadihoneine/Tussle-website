<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $table = 'level';
    protected $primaryKey = ['accountID','tournamentID'];
    protected $connection = 'mysql';
    public $timestamps = false;

    public function participateevent(){
        return $this->hasMany(ParticipateEvents::class);
    }

    protected $attributes = [ // 0 for admin, 1 for user
        'accountID',
        'tournamentID',
        'teamID',
        'points'
    ];

    protected $casts = [
        //
    ];

    protected $fillable = [
        'accountID',
        'tournamentID',
        'teamID',
        'points'
    ];


    //copy paste from internet, purpose is to allow multiple primary keys


    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }

}
