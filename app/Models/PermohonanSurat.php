<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanSurat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */

     protected $table = 'permohonan_surats';
    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'jenis_surat',
        'status',
        'tanggal_lahir',
        'jenis_kelamin',
    ];
}
