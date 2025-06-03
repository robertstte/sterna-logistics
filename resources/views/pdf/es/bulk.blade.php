<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sterna Facturación</title>
</head>
<body>
    <header>
        <p class="logo">Sterna.</p>
        <p class="date">Fecha emisión: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        <p class="range">Desde {{ \Carbon\Carbon::parse($start_date)->format('d/m/Y') }} hasta {{ \Carbon\Carbon::parse($end_date)->format('d/m/Y') }}</p>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="text-left">Orden</th>
                    <th class="text-left">Origen</th>
                    <th class="text-left">Destino</th>
                    <th class="text-left">Fecha Salida</th>
                    <th class="text-left">Fecha LLegada</th>
                    <th class="text-right">Coste</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($orders as $order)
                    <tr>
                        <td class="text-left">{{ $order->id }}</td>
                        <td class="text-left">{{ $order->orderDetail->originCountry->name }}</td>
                        <td class="text-left">{{ $order->orderDetail->destinationCountry->name }}</td>
                        <td class="text-left">{{ $order->orderDetail->departure_date }}</td>
                        <td class="text-left">{{ $order->orderDetail->arrival_date }}</td>
                        <td class="text-right">{{ $order->orderDetail->total_cost }} €</td>
                    </tr>
                    @php $total += $order->orderDetail->total_cost; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-left">Total</td>
                    <td class="text-right">@php echo $total @endphp €</td>
                </tr>
            </tfoot>
        </table>
    </main>
    <p class="footer-text">Todas las facturas se generan exentas de IVA.</p>
</body>
</html>

<style>
    body, main, p {
        margin: 0;
        padding: 0;
    }
    header {
        position: relative;
        background-color: rgb(0, 31, 63);
        padding: 10px 25px;
        color: white;
    }
    .logo {
        font-size: 64px;
        font-weight: 700;
        font-family: Arial, sans-serif;
        margin: 0;
    }
    .date {
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 16px;
        font-weight: bold;
        font-family: Arial, sans-serif;
    }
    .range {
        position: absolute;
        top: 30px;
        right: 25px;
        font-size: 16px;
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        margin-top: 25px;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }
    table td, table th {
        border: 1px solid #ddd;
        padding: 8px;
    }
    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    table tr:hover {
        background-color: #ddd;
    }
    table th {
        color: white;
        text-align: left;
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: rgb(0, 31, 63);
    }
    .text-left {
        text-align: left;
    }
    .text-right {
        text-align: right;
    }
    .footer-text {
        position: fixed;
        bottom: 2px;
        left: 25px;
        right: 25px;
        font-size: 14px;
        font-family: Arial, sans-serif;
        text-align: center;
        color: #555;
    }
</style>