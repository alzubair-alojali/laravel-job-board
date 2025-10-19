<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','body','author','published'];//filed that can be updated
    protected $guarded = ['id']; //cannot be updades/assigned (read only)
}
