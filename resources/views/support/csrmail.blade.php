<div
    style="max-width:600px;margin:0 auto;background:#fff;border-radius:8px;overflow:hidden;font-family:Arial,sans-serif;color:#333;">

    <!-- Header -->
    <div style="background:linear-gradient(90deg,#3b82f6,#6366f1);padding:24px;text-align:center;">
        <h1 style="margin:0;font-size:24px;font-weight:700;color:#fff;">🎫 New Support Ticket</h1>
        <p style="margin:4px 0 0;font-size:12px;opacity:.75;color:#eef2ff;">Ticket #{{ $ticket->id }}</p>
    </div>

    <!-- Body -->
    <div style="padding:24px;line-height:1.5;">
        <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:16px;">
            <tr>
                <td style="vertical-align:top;padding-bottom:8px;">
                    <p style="margin:0;font-size:11px;color:#6b7280;text-transform:uppercase;font-weight:600;">Subject
                    </p>
                    <p style="margin:4px 0 0;font-size:16px;color:#111;">{{ $ticket->subject }}</p>
                </td>
                <td style="vertical-align:top;padding-bottom:8px;">
                    <p style="margin:0;font-size:11px;color:#6b7280;text-transform:uppercase;font-weight:600;">From</p>
                    <p style="margin:4px 0 0;font-size:16px;color:#111;">{{ $ticket->email }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="vertical-align:top;padding-top:8px;">
                    <p style="margin:0;font-size:11px;color:#6b7280;text-transform:uppercase;font-weight:600;">Submitted
                        At</p>
                    <p style="margin:4px 0 0;font-size:16px;color:#111;">
                        {{ $ticket->created_at->toDayDateTimeString() }}
                    </p>
                </td>
            </tr>
        </table>

        <hr style="border:none;border-top:1px solid #e5e7eb;margin:16px 0;">

        <h2 style="margin:0 0 8px;font-size:14px;font-weight:600;color:#111;">Message</h2>
        <div style="background:#f9fafb;padding:16px;border-radius:4px;color:#333;white-space:pre-wrap;">
            {{ $ticket->message }}
        </div>
    </div>

    <!-- Footer -->
    <div style="background:#f3f4f6;text-align:center;padding:12px;font-size:11px;color:#6b7280;">
        &copy; {{ date('Y') }} CloudPractitionerHelp. All rights reserved.
    </div>
</div>
