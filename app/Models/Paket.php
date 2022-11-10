<?php

namespace App\Models;

use App\Models\KategoriMotor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(KategoriMotor::class, 'kategori_id');
    }
}
