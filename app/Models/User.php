<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;
    use \Wildside\Userstamps\Userstamps;
    use HasApiTokens, HasFactory, Notifiable;



    // protected $keyType = 'string';
    // public $incrementing = false;
    protected $primaryKey = 'uuid';
    // ...


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'agent_id',
        'role_id',
        'email',
        'password',
        'must_reset_password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'must_reset_password' => 'boolean',
    ];

    public function agent()
    {
        return $this->hasOne(Agent::class, 'uuid', 'agent_id');
    }

    public function usager()
    {
        return $this->hasOne(Usager::class,'uuid','usager_id');
    }

    public function role()
    {
        return $this->hasOne(Role::class,'uuid','role_id');
    }
}
