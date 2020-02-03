<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{

    public function categories ()
    {
        return $this->BelongsToMany('App\Categories');

    }

    public function tags ()
    {
        return $this->BelongsToMany('App\Tags');
    }


}
