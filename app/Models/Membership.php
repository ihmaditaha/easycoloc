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
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
