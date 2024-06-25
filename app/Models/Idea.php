<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    //this ensures that these attributes are not mass assignable
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'content',
        'likes',
    ];

    public function comments(){
        return $this->hasMany(Comment::class, 'idea_id','id');
    }
}
