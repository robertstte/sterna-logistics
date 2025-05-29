<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sterna Invoice</title>
</head>
<body>
    <header>
        <p class="logo">Sterna.</p>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Departure Date</th>
                    <th>Arrival Date</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->orderDetail->origin }}</td>
                    <td>{{ $order->orderDetail->destination }}</td>
                    <td>{{ $order->orderDetail->departure }}</td>
                    <td>{{ $order->orderDetail->arrival }}</td>
                    <td>{{ $order->orderDetail->total_cost }}</td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap');
    header {
        height: 100px;
        background-color: rgb(0, 31, 63);
    }
    .logo {
        font-size: 64px;
        padding-top: 10px;
        font-weight: 700;
        margin-left: 25px;
        font-family: "Onest";
        color: rgb(255, 255, 255);
    }
</style>