<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pemilik',
        'rekening',
        'nominal',
        'bukti',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Ppdbs::class, 'user_id');
    }
}
