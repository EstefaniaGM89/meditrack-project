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

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Recordatori de medicació')
            ->greeting('Hola!')
            ->line("Toca prendre el medicament: **{$this->recordatori->medicament}**.")
            ->line("Dosificació: {$this->recordatori->dosificacio}")
            ->line("Hora programada: {$this->recordatori->data_hora}")
            ->line('Cuida’t!');
    }
}
