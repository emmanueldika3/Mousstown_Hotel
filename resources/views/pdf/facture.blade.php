<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture - {{ $booking->id }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; }
        .header { text-align: right; margin-bottom: 50px; }
        .logo { color: #ff6b00; font-weight: bold; font-size: 24px; text-align: left; float: left; }
        .invoice-box { width: 100%; border-collapse: collapse; }
        .invoice-box td { padding: 10px; border-bottom: 1px solid #eee; }
        .total { background: #0f172a; color: white; font-weight: bold; }
        .footer { margin-top: 50px; font-size: 12px; text-align: center; color: #777; }
    </style>
</head>
<body>
    <div class="logo">MOUSSTOWN</div>
    <div class="header">
        <h1>FACTURE N° {{ $booking->id }}</h1>
        <p>Date : {{ date('d/m/Y') }}</p>
    </div>

    <table class="invoice-box">
        <tr>
            <td><strong>Client :</strong> {{ $booking->user->name }}</td>
            <td><strong>Email :</strong> {{ $booking->email }}</td>
        </tr>
        <tr>
            <td><strong>Hébergement :</strong> Suite {{ $booking->room->room_number }}</td>
            <td><strong>Type :</strong> {{ $booking->room->type }}</td>
        </tr>
        <tr>
            <td><strong>Arrivée :</strong> {{ $booking->check_in }}</td>
            <td><strong>Départ :</strong> {{ $booking->check_out }}</td>
        </tr>
        <tr class="total">
            <td>TOTAL À PAYER</td>
            <td>{{ number_format($booking->total_price, 0, ',', ' ') }} XAF</td>
        </tr>
    </table>

    <div class="footer">
        <p>Mousstown Management - Douala, Cameroun</p>
        <p>Merci de votre confiance.</p>
    </div>
</body>
</html>