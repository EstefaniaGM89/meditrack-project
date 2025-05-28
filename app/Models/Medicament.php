<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'dosi', 'descripcio'];

    public function recordatoris()
    {
        return $this->hasMany(Recordatori::class);
    }
}
