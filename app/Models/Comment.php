<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id','parent_id','comment','commentable_type','commentable_id','status','ip'
    ];
    protected $dates = ['deleted_at'];

    public function commentable()
    {
        return $this->morphTo();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = str_replace(PHP_EOL , "<br>" , $value);
    }

}
