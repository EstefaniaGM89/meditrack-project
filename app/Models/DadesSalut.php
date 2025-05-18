<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadesSalut extends Model
{
    use HasFactory;

    protected $table = 'dades_salut';
    protected $fillable = ['pacient_id', 'tipus_dada', 'valor', 'unitats', 'data_registre'];

    public function pacient()
    {
        return $this->belongsTo(Pacient::class, 'pacient_id');
    }
}
