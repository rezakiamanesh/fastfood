<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function scopeOwner($query)
    {
        if (auth()->user()->isAdmin()) {
            return $query;
        } else {
            return $query->where('user_id', auth()->id());
        }
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class)->withTrashed();
    }
}
