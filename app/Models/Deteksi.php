<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deteksi extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'tekanandarah', 'kolesterol', 'gambar'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
