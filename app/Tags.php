<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';

    public $timestamps = false;

    public function blogs ()
    {
        return $this->BelongsToMany('App\Blogs');

    }
}
