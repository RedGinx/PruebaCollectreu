<?php

namespace App\Mail;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;


    public function __construct($transaction)
    {
        $this->transaction = $transaction;
        $this->buyerName = $transaction->buyer->name; // Asegúrate de que buyer está cargado correctamente
    }

    public function build()
    {
        return $this->subject('Confirmación de Transacción')
            ->view('emails.transaction')
            ->with([
                'transaction' => $this->transaction,
                'buyerName' => $this->buyerName, // Aquí pasamos buyerName
            ]);
    }
}
