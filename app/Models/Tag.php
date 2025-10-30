<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasUuids;
    //primary key
    protected $primaryKey = "id";
    protected $keyType = "string"; //UUID
    public $incrementing = false;

    protected $table = 'tag';
    protected $fillable = ['title'];//filed that can be updated
    protected $guarded = ['id']; //cannot be updades/assigned (read only)


public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
