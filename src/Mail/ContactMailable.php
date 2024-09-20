<?php

namespace Digimantra\Digiemail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $content;
    public $view;
    public $subject;
    public $files;
    /**
     * Create a new message instance.
     */
    public function __construct($content, $view, $subject, $files)
    {
        $this->content = $content;
        $this->view = $view;
        $this->subject = $subject;
        $this->files = $files;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if(!empty($this->view)){
            return new Content(
                view: $this->view,
            );
        } else {
            return new Content(
                html: $this->content,
                markdown: 'contact.email'
            );
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        foreach ($this->files as $file) {
            $attachments[] = new Attachment(
                path: $file['path'],      
                as: $file['name'] ?? null, 
                mime: $file['mime'] ?? null 
            );
        }

        return $attachments;
    }

}
