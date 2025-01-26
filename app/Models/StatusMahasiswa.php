<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class StatusMahasiswa  extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'status_mahasiswa';
    protected $fillable = [
        'nama_status_mahasiswa',
    ];

    public $timestamps = true;

    // (Opsional) Tentukan primary key jika berbeda dari default 'id'
    protected $primaryKey = 'id';
}
