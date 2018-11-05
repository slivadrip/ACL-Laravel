<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    
    public function permissions()    {
        return $this->belongsToMany(\App\Models\Permission::class);
    }
}
