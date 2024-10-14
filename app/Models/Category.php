<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Kolom yang bisa diisi secara massal

    /**
     * Relasi ke model Item.
     * Asumsi: Satu kategori bisa memiliki banyak item.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
