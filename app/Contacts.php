<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';

    protected $fillable = [
        'id',
    	'fname',
    	'lname',
    	'email',
        'number',
        'user_id'
    ];
}
