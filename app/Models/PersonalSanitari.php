<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalSanitari extends Model
{
    use HasFactory;

    protected $table = 'personal_sanitari';

    protected $fillable = [
        'nom',
        'rol',
        'email',
        'password',
    ];

    protected $hidden = ['password'];

    public function recordatoris()
    {
        return $this->hasMany(Recordatori::class);
    }
}
