<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    protected $table = 'role_user';

    protected $primaryKey = 'role_id';

    protected $fillable = [
        'user_id',
        'role_id',
        '_status'
    ];

    public static $createRules = [
        'user_id' => 'required|integer',
        'role_id' => 'required|integer'
    ];

    public static $updateRules = [
        'user_id' => 'nullable|integer',
        'role_id' => 'nullable|integer'
    ];
}
