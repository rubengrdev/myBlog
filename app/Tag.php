<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['id','tag', 'created_at', 'updated_at'];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
