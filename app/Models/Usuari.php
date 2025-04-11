<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuari extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'usuaris';
    protected $fillable = ['nom', 'email', 'pass', 'data_naixement'];
    protected $hidden = ['pass'];

    public $timestamps = false; // 🔹 Evita que Laravel intente actualizar created_at y updated_at

    public function medicaments()
    {
        return $this->hasMany(Medicament::class, 'usuari_id');
    }

    public function dadesSalut()
    {
        return $this->hasMany(DadesSalut::class, 'usuari_id');
    }

    public function recordatoris()
    {
        return $this->hasMany(Recordatori::class, 'usuaris_id');
    }
}
