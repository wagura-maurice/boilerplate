<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'name',
        'description',
        '_status'
    ];

    public static $createRules = [
        'name'        => 'required|string|unique:permissions',
        'description' => 'nullable|string'
    ];

    public static $updateRules = [
        'name'        => 'nullable|string',
        'description' => 'nullable|string'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
