<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendAcaraMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from('support@fajrulislamtes.ugcorpusskkni.online')
        // ->view('emailku')
        // ->with(
        //     [
        //         'nama' => 'Diki Alfarabi Hadi',
        //         'website' => 'www.malasngoding.com',
        //     ]
        // );
        // return $this->view('view.name');
    }
}
