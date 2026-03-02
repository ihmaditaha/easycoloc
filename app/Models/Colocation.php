<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    /** @use HasFactory<\Database\Factories\ColocationFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
    ];

    public function users()
    {
        return $this->hasManyThrough(User::class, Membership::class);
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function Invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
