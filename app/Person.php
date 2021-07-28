<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';

    protected $primaryKey = 'id';

    public static $rules = [
        'email' => 'email:rfc,dns|unique:people,email'
    ];

    /** Messages
     */
    public static $messages = [
        'email.email' => 'Format no valid',
        'email.unique' => 'Mail already registered',
    ];

    //protected $fillable = [];

    protected $guarded = [];

    /***** Relationships */
    //A person assisted to many events
    
    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }
    
}
