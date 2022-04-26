<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Post;

class Category extends Model
{
   protected $fillable=['name'];

   function posts(){
       return $this->hasMany(Post::class);
   }
}
