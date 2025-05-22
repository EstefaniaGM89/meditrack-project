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

    // Utilitzat per enviar la notificació
    // a través del canal de correu electrònic
    public function via($notifiable)
    {
        return ['mail'];
    }

    // Contingut del correu electrònic
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
    //  Això funciona desde terminal però no desde la web i no em convenç
}