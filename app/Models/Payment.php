<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ppdbs;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'ppdbs_id',
        'pemilik',
        'rekening',
        'nominal',
        'bukti',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Ppdbs::class, 'ppdbs_id');
    }
}
