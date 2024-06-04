<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanBarang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pemakaianStok()
    {
        return $this->hasMany(PemakaianStok::class);
    }
}