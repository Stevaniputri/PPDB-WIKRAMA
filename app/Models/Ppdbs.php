<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Ppdbs extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'name',
        'school',
        'gender',
        'email',
        'major',
        'created_at',
    ];

    public function payment(){
        return $this->hasOne(Payment::class);
    }
}
