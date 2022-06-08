<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name' , 'label' ,'method' , 'deleted_at'
    ];

    public function scopePermissionAdmin($query)
    {
        if (auth()->user()->idAdmin()) {
            return $query->orderBy('id', 'desc');
        } else {
            return $query->whereNotIn('name',config('whiteRoute.adminRoute'))->orderBy('id', 'desc');
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
