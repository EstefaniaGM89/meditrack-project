<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Recordatori;

class RecordatoriMedicament extends Notification
{
    use Queueable;

    protected $recordatori;

    public function __construct(Recordatori $recordatori)
    {
        $this->recordatori = $recordatori;
    }

    // Solo usamos el canal de correo, eliminamos 'database'
    public function via($notifiable)
    {
        return ['mail']; // Ya no se usará la base de datos
    }

    // Si usas envío de correos, este es el contenido
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Recordatori de medicament')
            ->greeting('Hola!')
            ->line("Toca prendre el medicament: **{$this->recordatori->medicament->nom}**")
            ->line("Dosificació: {$this->recordatori->medicament->dosi}")
            ->line("Hora programada: {$this->recordatori->data_hora}")
            ->line('Cuida’t!');
    }
    // public function toArray($notifiable)
}
