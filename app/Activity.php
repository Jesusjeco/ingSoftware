<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $primaryKey = 'id';

    //protected $fillable = [];
    
    protected $guarded = [];

    //*** Relationships */
    //An activity is within many privileges
    
    public function privileges()
    {
        return $this->hasMany(Privilege::class);
    }
}
