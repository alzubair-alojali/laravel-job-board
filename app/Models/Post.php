<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //for make bulk fake data
    use HasFactory;

    use HasUuids;
    //primary key
    protected $primaryKey = "id";
    protected $keyType = "string"; //UUID
    public $incrementing = false;

    //set the table name
    protected $table ='post';
    protected $fillable = ['title','body','author','published'];//filed that can be updated
    protected $guarded = ['id']; //cannot be updades/assigned (read only)

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
