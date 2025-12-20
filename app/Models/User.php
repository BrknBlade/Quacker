<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    public function following(){
        return $this->belongsToMany(User::class, 'user_user', 'follower_id', 'following_id');
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'user_user', 'following_id', 'follower_id');
    }

    public function quacks(){
        return $this->hasMany(Quack::class);
    }

    public function requacks(){
        return $this->belongsToMany(Quack::class, 'quack_user', 'user_id', 'quack_id');
    }

    public function quaveos(){
        return $this->belongsToMany(Quack::class, 'quack_user_quav', 'user_id', 'quack_id');
    }
}
