<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    use HasUuids;
    //primary key
    protected $primaryKey = "id";
    protected $keyType = "string"; //UUID
    public $incrementing = false;
    protected $table ='comment';
    protected $fillable = ['author','content','post_id'];
    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo(post::class);
    }
}