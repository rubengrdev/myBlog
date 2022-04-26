<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
   protected $fillable=['id','contents','post_id','user_id'];

   public function user(){
       return $this->belongsTo(User::class);
   }
   public function post()
   {
       return $this->belongsTo(Post::class);
   }
}
