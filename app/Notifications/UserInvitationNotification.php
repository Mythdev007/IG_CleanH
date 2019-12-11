<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserInvitationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $polizzaCar;
    public $mail_kind;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($polizzaCar = null, $mail_kind = null)
    {
        $this->polizzaCar = $polizzaCar;
        $this->mail_kind = $mail_kind;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        # return ['mail'];
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
        $polizzaCar = $this->polizzaCar;
        $mail_kind = $this->mail_kind;

        $subject = '';
        $intro = '';

        if ($mail_kind == 'invite') {

            if ($polizzaCar) {
                $subject = 'CAR Convenzione Italgas – Preventivo n.  ' . $polizzaCar->id . '  ,  ' . $polizzaCar->company_name;
                $greetings = sprintf('Spettabile %s!', $polizzaCar->company_name);
            } 

            return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greetings)   
                    ->line('Abbiamo il piacere di comunicarLe che il Preventivo e la relativa documentazione di Polizza, nello specifico le informative precontrattuali e contrattuali, sono disponibili per la stampa nell’area dedicata del portale assicurativo messo a disposizione da ITALGAS.')
                    ->line('Ai fini del perfezionamento della polizza, dopo aver attentamente controllato la correttezza dei dati riportati nel Preventivo, dovrà:')
                    ->line('Effettuare il pagamento del premio di polizza a mezzo bonifico alle coordinate bancarie di seguito indicate:')
                    ->line('STRATEGICA INSURANCE MANAGEMENT SRL')
                    ->line('IBAN: IT24X0311101616000000001386')
                    ->line('Effettuare il caricamento della documentazione di Polizza sottoscritta unitamente alla disposizione di pagamento nella sezione della piattaforma.')
                    ->line('Le segnaliamo che la documentazione di polizza è sempre disponibile nella sezione Documenti del portale ITALGAS.')
                    ->action('Accedi al portale ITALGAS', url('/password/custom_reset/' . $notifiable->verification_token))
                    ->line('Sarà nostra cura informarla non appena il Certificato di polizza sarà disponibile nella sua area personale. Rimaniamo a Sua completa disposizione per qualsiasi approfondimento.')
                    ->line('STRATEGICA INSURANCE MANAGEMENT SRL')
                    ->line('Via Leopardi 7, Milano (MI), 20123')
                    ->line('C.F./P.IVA 13068140154')
                    ->line('RUI IVASS: B000156620');
        } else if ($mail_kind == 'approve') {
            if ($polizzaCar) {
                $subject = 'Autorizzazione Richiesta - CAR Convenzione Italgas – Preventivo n.  ' . $polizzaCar->id . '  ,  ' . $polizzaCar->company_name;
                $intro = ('Gentile Strategica,');
                $prev_num = $polizzaCar->id;
            }

            return (new MailMessage)
                    ->subject($subject)
                    ->greeting($intro)
                    ->line('Un nuovo Preventivo è in attesa di approvazione.')
                    ->line('Clicca il link di seguito per proseguire ed Approvare il Preventivo ed inviare una mail all’appaltatore:')
                    ->action('Accedi al portale ITALGAS', url('/polizzacar/polizzacar/' . $polizzaCar->id));
        } else if ($mail_kind == 'send_to_contractor') {
            if ($polizzaCar) {
                $subject = 'CAR Convenzione Italgas – Preventivo n.  ' . $polizzaCar->id . '  ,  ' . $polizzaCar->company_name;
                $greetings = sprintf('Spettabile %s!', $polizzaCar->company_name);
            } 

            return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greetings)   
                    ->line('Abbiamo il piacere di comunicarLe che il Preventivo e la relativa documentazione di Polizza, nello specifico le informative precontrattuali e contrattuali, sono disponibili per la stampa nell’area dedicata del portale assicurativo messo a disposizione da ITALGAS.')
                    ->line('Ai fini del perfezionamento della polizza, dopo aver attentamente controllato la correttezza dei dati riportati nel Preventivo, dovrà:')
                    ->line('Effettuare il pagamento del premio di polizza a mezzo bonifico alle coordinate bancarie di seguito indicate:')
                    ->line('STRATEGICA INSURANCE MANAGEMENT SRL')
                    ->line('IBAN: IT24X0311101616000000001386')
                    ->line('Effettuare il caricamento della documentazione di Polizza sottoscritta unitamente alla disposizione di pagamento nella sezione della piattaforma.')
                    ->line('Le segnaliamo che la documentazione di polizza è sempre disponibile nella sezione Documenti del portale ITALGAS.')
                    ->action('Accedi al portale ITALGAS', url('/polizzacar/polizzacar/' . $polizzaCar->id))
                    ->line('Sarà nostra cura informarla non appena il Certificato di polizza sarà disponibile nella sua area personale. Rimaniamo a Sua completa disposizione per qualsiasi approfondimento.')
                    ->line('STRATEGICA INSURANCE MANAGEMENT SRL')
                    ->line('Via Leopardi 7, Milano (MI), 20123')
                    ->line('C.F./P.IVA 13068140154')
                    ->line('RUI IVASS: B000156620');
        } else if ($mail_kind == 'check_pdfs') {
            if ($polizzaCar) {
                $subject = 'Verifica Richiesta - CAR Convenzione Italgas – Preventivo n.  ' . $polizzaCar->id . '  ,  ' . $polizzaCar->company_name;
                $intro = ('Gentile Strategica,');
            }

            return (new MailMessage)
                    ->subject($subject)
                    ->greeting($intro)   
                    ->line('Caricamento della documentazione di proposta e del pagamento completato da parte dell’appaltatore.')
                    ->line('Una volta verificati i Documenti allegati, puoi confermare l’ordine alla compagnia cliccando di seguito:')
                    ->action('Accedi al portale ITALGAS', url('/polizzacar/polizzacar/' . $polizzaCar->id))
                    ->attach(storage_path('uploaded_docs') . '/' . $polizzaCar->pdf_signed_contract)
                    ->attach(storage_path('uploaded_docs') . '/' . $polizzaCar->pdf_payment_proof);
                    
        } else if ($mail_kind == 'order_complete') {
            if ($polizzaCar) {
                $subject = 'Notifica emissione Polizza CAR Convenzione Italgas – Polizza n.  ' . $polizzaCar->id . '  ,  ' . $polizzaCar->company_name;
                $greetings = sprintf('Spettabile %s!', $polizzaCar->company_name);
            }

            return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greetings)   
                    ->line('La informiamo che nell’area dedicata del portale assicurativo è disponibile il suo Certificato di polizza per la stampa.')
                    ->action('Accedi al Portale ITALGAS', url('/polizzacar/polizzacar/' . $polizzaCar->id));
                    
        }

        
                
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
