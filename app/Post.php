<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;
use App\Tag;
use App\Category;

class Post extends Model
{
   protected $fillable=['id','title','contents','user_id','category_id'];

   public function tags(){
       return $this->belongsToMany(Tag::class);
   }
   public function user(){
       return $this->belongsTo(User::class);
   }
   public function category(){
       return $this->belongsTo(Category::class);
   }
   public function comments(){
       return $this->hasMany(Comment::class);
   }
}
