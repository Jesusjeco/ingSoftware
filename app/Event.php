<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $primaryKey = 'id';

    //protected $fillable = [];
    
    protected $guarded = [];

    //*** Relationships */
    //Event has many asisstances
    
    public function assistances()
    {
        return $this->hasMany(Attendee::class);
    }
    
}
