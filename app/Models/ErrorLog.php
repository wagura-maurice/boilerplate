<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    use HasFactory;

    const PENDING = 0;
    const OPEN    = 1;
    const CLOSED  = 2;

    protected $table = 'error_logs';

    protected $fillable = [
        'title',
        '_class',
        'description',
        '_status'
    ];

    public static $createRules = [
        'title'       => 'required|string',
        '_class'      => 'required|string',
        'description' => 'required|string'
    ];

    public static $updateRules = [
        'title'       => 'nullable|string',
        '_class'      => 'required|string',
        'description' => 'nullable|string'
    ];
}
