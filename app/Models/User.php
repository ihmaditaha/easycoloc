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
        'role_id',
        'is_banned',
        'reputation',
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

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function colocations()
    {
        return $this->belongsToMany(Colocation::class, 'memberships')
            ->withPivot('joined_at', 'left_at')
            ->withTimestamps()
            ->using(Membership::class);
    }

    public function activeColocation()
    {
        return $this->colocations()->wherePivotNull('left_at')->where('status', 'active');
    }

    public function createdExpenses()
    {
        return $this->hasMany(Expense::class, 'creator_id');
    }

    public function paidExpenses()
    {
        return $this->hasMany(Expense::class, 'payer_id');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function isAdmin()
    {
        return $this->role->title == 'admin';
    }
}
