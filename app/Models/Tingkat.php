<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tingkat  extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'tingkat';
    protected $fillable = [
        'nama_tingkat',
    ];

    public $timestamps = true;

    // (Opsional) Tentukan primary key jika berbeda dari default 'id'
    protected $primaryKey = 'id';
}
