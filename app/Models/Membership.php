<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    /** @use HasFactory<\Database\Factories\JoinedColocationFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'colocation_id',
        'created_at',
        'left_at',
        'role',
    ];

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function isActive(): bool
    {
        return $this->left_at === null;
    }
}
