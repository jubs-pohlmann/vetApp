<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
use App\Client;
use App\Product;
class saleConfirmation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, User $client, Product $product, string $delivery_day)
    {
      $this->store = $user;
      $this->client = $client;
      $this->product = $product;
      $this->date = $delivery_day;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
      $url = url('localhost:8100/tabs/anunciar-produto');
        return (new MailMessage)
                    ->greeting('Nova venda realizada!')
                    ->line('Olá, '.$this->store->name)
                    ->line('Dados do cliente')
                    ->line('Nome: '.$this->client->name)
                    ->line('Endereço: '.$this->client->address)
                    ->line('Produto comprado: '.$this->product->name)
                    ->line('A data prevista para a entrega do seu pedido é: '.$this->date) //adicionar data de entrega
                    ->action('Ofertar novos produtos.',$url); //botão
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
