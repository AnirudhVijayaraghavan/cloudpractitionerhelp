<?php

namespace App\Jobs;

use App\Models\SupportTicket;
use App\Mail\CustomerSupportMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCustomerSupportMailJob implements ShouldQueue
{
    use Queueable;
    public SupportTicket $ticket;
    /**
     * Create a new job instance.
     */
    public function __construct(
        SupportTicket $ticket
    ) {
        $this->ticket = $ticket;
    }

    public function handle(): void
    {
        // send to your admin
        Mail::to('anirudh1997@hotmail.com')
            ->send(new CustomerSupportMail($this->ticket));
    }
}
