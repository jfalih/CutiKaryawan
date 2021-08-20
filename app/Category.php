<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }
}
