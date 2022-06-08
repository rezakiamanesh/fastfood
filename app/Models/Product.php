<?php

namespace App\Models;

use App\Traits\HasCategory;
use App\Traits\HasComment;
use App\Traits\HasImage;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasImage, Sluggable,SoftDeletes,HasCategory,HasComment;

    protected $fillable = ['user_id','title','slug','description','price','stock','status','viewCount','commentCount','soldCount','time_to_prepare'];
    protected $dates = ['deleted_at'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($product) {
            $product->comments()->delete();
            $product->image()->delete();
        });
    }
    public function path()
    {
        return 'product/'.$this->slug;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);

    }
}
