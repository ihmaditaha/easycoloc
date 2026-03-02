<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /** @use HasFactory<\Database\Factories\ExpenseFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'amount',
        'status',
        'category_id',
        'paid_by',
        'date',
        'created_by',
        'colocation_id',
    ];

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function payer()
    {
        return $this->belongsTo(User::class,'paid_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
