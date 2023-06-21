<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_tamu', 
        'nama_alamat', 
        'tanggal',
        'nama',
    ];
    public function detail()
    {
        return $this->hasMany(Detail::class, 'id_tamu', 'id_tamu');
    }

    public function getManager()
    {
        return $this->belongsTo(User::class, 'nama', 'id');
    }
}
