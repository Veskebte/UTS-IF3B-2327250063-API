<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'ukuran',
        'harga',
    ];

    public function menu() {
        return $this->belongsTo(Menu::class);
    }
}
