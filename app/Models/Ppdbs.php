<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdbs extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'name',
        'school',
        'gender',
        'email',
        'tlp',
        'papa',
        'mama',
        'created_at',
    ];

    public function pembayaran(){
        return $this->hasOne(Payment::class);
    }
}
