<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'app_id'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
