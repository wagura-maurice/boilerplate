<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'name',
        'description',
        '_status'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    public function allowTo($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::whereName($permission)->firstOrFail();
        }

        return $this->permissions()->sync($permission, false);
    }

    public function disallowTo($permission)
    {
        return $this->permissions()->detach($permission);
    }

    public static $createRules = [
        'name'        => 'required|string|unique:roles',
        'description' => 'nullable|string'
    ];

    public static $updateRules = [
        'name'        => 'nullable|string',
        'description' => 'nullable|string'
    ];
}
