<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationPakarEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email_data;

    public function __construct($email_data)
    {
        $this->email_data = $email_data;
    }

    public function build()
    {
        return $this->from('admin@temu-pakar.com')
            ->subject('Selangkah Lagi Menjadi Pakar di Aplikasi Temu Pakar')
            ->view('email.user.registration_pakar');
    }
}
