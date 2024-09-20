<?php

namespace Digimantra\Digiemail\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Digimantra\Digiemail\Mail\ContactMailable;

class SendContactEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $content;
    protected $view;
    protected $subject;
    protected $files;
    protected $email;

    public function __construct($email, $content, $view, $subject, $files)
    {
        $this->email = $email;
        $this->content = $content;
        $this->view = $view;
        $this->subject = $subject;
        $this->files = $files;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new ContactMailable($this->content, $this->view, $this->subject, $this->files));
    }
}
