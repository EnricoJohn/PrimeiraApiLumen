<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    function tickets() {
        
        return $this->hasMany(Ticket::class);
        
    }
}
