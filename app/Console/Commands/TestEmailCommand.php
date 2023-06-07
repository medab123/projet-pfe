<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class TestEmailCommand extends Command
{
    protected $signature = 'email:test';

    protected $description = 'Send a test email';

    public function handle()
    {
        $details = [
            'title' => 'Test Email',
            'body' => 'This is a test email sent using Laravel.'
        ];

        Mail::to('mohammed.elabidi123@gmail.com')->send(new TestMail($details));

        $this->info('Test email sent.');
    }
}
