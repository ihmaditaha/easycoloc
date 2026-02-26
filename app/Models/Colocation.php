<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    /** @use HasFactory<\Database\Factories\ColocationFactory> */
    use HasFactory;

    public function users(){
        return $this->hasManyThrough(User::class,Membership::class);
    }

    public function membership(){
        return $this->hasMany(Membership::class);
    }
}
