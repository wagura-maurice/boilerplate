<?php

namespace App\Models;

use App\Traits\HasGravatar;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail 
{
    use HasFactory, Notifiable, HasGravatar;

    const PENDING  = 0;
    const ACTIVE   = 1;
    const INACTIVE = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_number',
        'phone_number_verified_at',
        'email',
        'email_verified_at',
        'password',
        '_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone_number_verified_at' => 'datetime',
        'email_verified_at' => 'datetime'
    ];

    /**
     * The attributes to be appended on each retrieval.
     *
     * @var array
     */
    protected $appends = [
        'isAdministrator',
        'isManager',
        'isGuest'
    ];

    public function getIsAdministrator() {
        return auth()->user()->roles->contains('name', 'administrator');
    }

    public function getIsManager() {
        return auth()->user()->roles->contains('name', 'manager');
    }

    public function getIsGuest() {
        return auth()->user()->roles->contains('name', 'guest');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
            // $role = Role::whereName($role)->firstOrCreate(['name' => $role]);
        }

        return $this->roles()->sync($role, false);
        // return $this->roles()->syncWithoutDetaching($role);
    }

    public function unassignRole($role)
    {
        return $this->roles()->detach($role);
    }

    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->pluck('name')->unique();
    }

    public static $createRules = [
        'name'                     => 'required|string',
        'phone_number'             => 'nullable|string|unique:users',
        'phone_number_verified_at' => 'nullable|string|confirmed',
        'email'                    => 'required|email|unique:users',
        'email_verified_at'        => 'nullable|string|confirmed',
        'password'                 => 'required|string|confirmed'
    ];

    public static $updateRules = [
        'name'                     => 'nullable|string',
        'phone_number'             => 'nullable|string',
        'phone_number_verified_at' => 'nullable|string',
        'email'                    => 'nullable|email',
        'email_verified_at'        => 'nullable|string',
        'password'                 => 'nullable|string'
    ];
}
