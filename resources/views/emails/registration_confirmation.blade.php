<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.8;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #f9f9fb;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #eaeaea;
        }

        .email-header {
            background: linear-gradient(135deg, #0d6efd, #0142a3);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }

        .email-header h1 {
            margin: 0;
            font-size: 26px;
            font-weight: bold;
        }

        .email-body {
            padding: 30px;
            font-size: 16px;
            color: #4a4a4a;
        }

        .email-body p {
            margin: 0 0 15px;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .details-table th, .details-table td {
            border: 1px solid #ddd;
            padding: 14px;
            text-align: left;
        }

        .details-table th {
            background: #f1f5f9;
            color: #1f2937;
            font-weight: bold;
            text-transform: capitalize;
            font-size: 14px;
        }

        .details-table td {
            background: #ffffff;
            color: #374151;
            font-size: 15px;
        }

        .details-table tr:nth-child(even) {
            background: #f9fafb;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 14px 25px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            background: #0d6efd;
            text-decoration: none;
            border-radius: 6px;
            text-align: center;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background: #0142a3;
            transform: translateY(-2px);
        }

        .email-footer {
            background: #f1f5f9;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #6b7280;
        }

        .email-footer a {
            color: #0d6efd;
            text-decoration: none;
            margin: 0 5px;
        }

        .email-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .email-body {
                padding: 20px;
            }

            .details-table th, .details-table td {
                font-size: 13px;
                padding: 12px;
            }

            .btn {
                padding: 12px 20px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Event Registration Confirmation</h1>
        </div>
        <div class="email-body">
            <p>Dear <strong>{{ $registration->user->name }}</strong>,</p>
            <p>Thank you for registering for the event. Below are your registration details:</p>
            <table class="details-table">
                <tr>
                    <th>Event</th>
                    <td>{{ $registration->event->title }}</td>
                </tr>
                <tr>
                    <th>Ticket Type</th>
                    <td>{{ ucfirst($registration->ticket_type) }}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $registration->quantity }}</td>
                </tr>
                <tr>
                    <th>Price Per Ticket</th>
                    <td>{{ $registration->event->price ? '₹' . number_format($registration->event->price, 2) : 'Price not available' }}</td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>{{ ucfirst($registration->payment_status) }}</td>
                </tr>
                <tr>
                    <th>Event Date</th>
                    <td>{{ $registration->event->date ? $registration->event->date : 'Date not available' }}</td>
                </tr>
            </table>
            <p>We are excited to have you with us. For further details about the event, click below:</p>
        </div>
        <div class="email-footer">
            <p>&copy; {{ now()->year }} Event Management System. All Rights Reserved.</p>
          
        </div>
    </div>
</body>
</html>
