<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quote #{{ $order->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111827; }
        h1 { font-size: 22px; margin-bottom: 4px; }
        h2 { font-size: 14px; margin-top: 24px; margin-bottom: 8px; border-bottom: 1px solid #d1d5db; padding-bottom: 4px; }
        table { width: 100%; border-collapse: collapse; margin-top: 8px; }
        th, td { text-align: left; padding: 8px; border: 1px solid #e5e7eb; }
        th { background: #f3f4f6; }
        .preview { margin-top: 16px; text-align: center; }
        .preview svg { max-width: 320px; max-height: 240px; width: auto; height: auto; }
        .meta { color: #6b7280; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Spa Cover Quote</h1>
    <p class="meta">Order #{{ $order->id }} &mdash; Generated {{ now()->format('M j, Y') }}</p>

    <h2>Customer Information</h2>
    <table>
        <tr><th>Name</th><td>{{ $customer->full_name }}</td></tr>
        <tr><th>Email</th><td>{{ $customer->email }}</td></tr>
        <tr><th>Phone</th><td>{{ $customer->phone ?? 'N/A' }}</td></tr>
        <tr><th>Address</th><td>{{ collect([$customer->address, $customer->city, $customer->province, $customer->postal_code])->filter()->join(', ') ?: 'N/A' }}</td></tr>
    </table>

    <h2>Spa Model Information</h2>
    <table>
        <tr><th>Model</th><td>{{ $spaModel->name }}</td></tr>
        <tr><th>Width</th><td>{{ $spaModel->width }} in</td></tr>
        <tr><th>Height</th><td>{{ $spaModel->height }} in</td></tr>
        <tr><th>Corner Radius</th><td>{{ $spaModel->corner_radius }} in</td></tr>
        <tr><th>Hinge Position</th><td>{{ $spaModel->hinge_position ?? 'N/A' }}</td></tr>
    </table>

    <h2>Order Details</h2>
    <table>
        <tr><th>Color</th><td>{{ $order->color }}</td></tr>
        <tr><th>Quantity</th><td>{{ $order->quantity }}</td></tr>
        <tr><th>Foam Thickness</th><td>{{ $order->foam_thickness ? $order->foam_thickness . ' in' : 'N/A' }}</td></tr>
        <tr><th>Status</th><td>{{ $order->status->getLabel() }}</td></tr>
    </table>

    <h2>Cover Preview</h2>
    <div class="preview">
        {!! $svg !!}
    </div>
</body>
</html>
