<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name' , 'label'];
    /* scope */
    public function scopeOwner($query)
    {
        if (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin()) {
            return $query;
        } else {
            return $query->where('id', auth()->id());
        }
    }

    public function scopeAdminRole($query)
    {
        if (auth()->user()->isSuperAdmin()) {
            return $query;
        } elseif(auth()->user()->isAdmin()) {
            return $query->where('id' , ">" , 1);
        }else{
            return $query->where('id', auth()->id());
        }
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function path()
    {
        return $this->label;
    }
}
