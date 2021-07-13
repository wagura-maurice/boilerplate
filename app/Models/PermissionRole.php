<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    protected $table = 'permission_role';

    protected $primaryKey = 'permission_id';

    protected $fillable = [
        'role_id',
        'permission_id',
        '_status'
    ];

    public static $createRules = [
        'role_id'       => 'required|integer',
        'permission_id' => 'required|integer'
    ];

    public static $updateRules = [
        'role_id'       => 'nullable|integer',
        'permission_id' => 'nullable|integer'
    ];
}
