<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //set the table name
    protected $table ='post';
    protected $fillable = ['title','body','author','published'];//filed that can be updated
    protected $guarded = ['id']; //cannot be updades/assigned (read only)

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
