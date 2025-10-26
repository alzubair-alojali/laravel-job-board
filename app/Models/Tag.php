<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $fillable = ['title'];//filed that can be updated
    protected $guarded = ['id']; //cannot be updades/assigned (read only)


public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
