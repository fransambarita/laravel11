<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Matakuliah  extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'matakuliah';
    protected $fillable = [
        'nama_matakuliah',
        'sks_teori',
        'sks_praktik',
        'deskripsi',
        'status_aktif',
        'jenis_matakuliah',
        'file_foto',
        

    ];

    public $timestamps = true;

    // (Opsional) Tentukan primary key jika berbeda dari default 'id'
    protected $primaryKey = 'id';
}
