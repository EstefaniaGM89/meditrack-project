<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalSanitari extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'personal_sanitari';

    protected $fillable = [
        'nom',
        'cognoms',
        'rol',
        'email',
        'password',
        'torn',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function recordatoris()
    {
        return $this->hasMany(Recordatori::class);
    }
}
