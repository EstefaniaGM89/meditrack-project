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

    // Especificamos que la notificación también irá a la base de datos
    public function via($notifiable)
    {
        return ['mail', 'database']; // 'database' canal para base de datos
    }

    // Para el correo electrónico
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

    // Guardar la notificación en la base de datos
    public function toDatabase($notifiable)
    {
        return [
            'titol' => 'Recordatori de medicament',
            'missatge' => "Toca prendre el medicament: {$this->recordatori->medicament->nom}",
            'recordatori_id' => $this->recordatori->id, // Información adicional
        ];
    }
}
