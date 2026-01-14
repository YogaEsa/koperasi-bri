<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'route', 'icon', 'order'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_menu');
    }
}
