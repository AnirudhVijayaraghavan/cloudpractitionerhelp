<?php

namespace App\Jobs;

use App\Models\SupportTicket;
use App\Mail\CustomerSupportMail;
use Illuminate\Support\Facades\Log;
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
        $adminEmail = config('app.admin_email');
        if (!$adminEmail) {
            // If for some reason it’s still null, bail out or throw:
            Log::error('ADMIN_EMAIL is not configured. Cannot send support ticket mail.');
            return;
        }

        // send to your admin
        Mail::to($adminEmail)
            ->send(new CustomerSupportMail($this->ticket));
    }
}
