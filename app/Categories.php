<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false;

        public function news()
        {

            return $this->belongsToMany('App\Blogs');

        }
}
