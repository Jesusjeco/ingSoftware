<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id';

    //protected $fillable = [];
    
    protected $guarded = [];

    //*** Relationships */
    //A role is within many privileges
    
    public function privileges()
    {
        return $this->hasMany(Privilege::class);
    }
}
