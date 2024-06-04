<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenisLayanan()
    {
        return $this->belongsTo(JenisLayanan::class, 'jenis_layanan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }


    public static function generateNomorAntrian()
    {
        $today = Carbon::today();

        // Menghitung jumlah antrean untuk hari ini
        $countToday = self::whereDate('created_at', $today)->count();

        // Nomor antrian adalah jumlah antrean hari ini ditambah 1
        return $countToday + 1;
    }
}