<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    protected $table = 'user_groups';

    protected $fillable = ['name', 'description'];

    protected $casts = ['status' => 'boolean'];

    public function users()
    {
        return $this->hasMany('App\User', 'user_group_id', 'id');
    }

    public function submodules()
    {
        return $this->belongsToMany('App\SubModule', 'groupHasModules', 'user_group_id', 'module_id');
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }

    public function permissions() {
        return $this->belongsToMany("App\Permission");
    }
}
