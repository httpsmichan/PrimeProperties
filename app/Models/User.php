<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    const ADMIN = 'admin';
    const AGENT = 'agent';
    const USER = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'role'
    ];

    public function isAdmin()
    {
        return $this->role === self::ADMIN;
    }

    public function isAgent()
    {
        return $this->role === self::AGENT;
    }

    public function isUser()
    {
        return $this->role === self::USER;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function agent()
    {
        return $this->hasOne(Agent::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
