<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemakaianStok extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function persediaanBarang()
    {
        return $this->belongsTo(PersediaanBarang::class, 'persediaan_barang_id');
    }
}