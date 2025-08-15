<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue; // Important for queue
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $registration;

    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    public function build()
    {
        return $this->subject('Your Event Registration Confirmation')
            ->markdown('emails.confirmation')
            ->with([
                'name' => $this->registration->name,
                'eventTitle' => $this->registration->event->title,
                'eventDate' => $this->registration->event->date->format('M d, Y'),
                'eventTime' => $this->registration->event->time,
                'eventVenue' => $this->registration->event->venue,
            ]);
    }
}
