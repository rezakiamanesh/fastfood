<?php

namespace App\Models;

use App\Traits\HasImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, HasImage, SoftDeletes,Sluggable;

    protected $table = "categories";
    protected $fillable = [
        'title', 'slug', 'user_id', 'parent_id', 'type', 'sorting', 'status'
    ];
    protected $dates = ['deleted_at'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorized($related = Product::class)
    {
        return $this->morphedByMany($related, 'categorizable');
    }

    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function subCategory()
    {
        return $this->hasMany(__CLASS__, 'parent_id')->orderBy('sorting', 'ASC');
    }

    public function path($entity = 'category')
    {
        return url($entity . "/" . $this->slug);
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'categorizable');
    }
}
