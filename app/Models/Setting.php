<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const ACTIVE   = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'item',
        'value',
        '_status'
    ];

    public static $createRules = [
        'item'  => 'required|string|unique:settings',
        'value' => 'nullable|string'
    ];

    public static $updateRules = [
        'item'  => 'nullable|string',
        'value' => 'nullable|string'
    ];
}
