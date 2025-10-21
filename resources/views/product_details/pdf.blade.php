<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Product Detail PDF</title>
    <style>
        body { font-family: sans-serif; }
        .container { padding: 20px; }
        h2 { text-align: center; }
        p { font-size: 14px; margin-bottom: 6px; }
        .info { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Product Details</h2>
        <div class="info">
            <p><strong>Name:</strong> {{ $products->products->name ?? '' }}</p>
            <p><strong>Price:</strong>₹{{ $products->products->value ?? '' }}</p>
            <p><strong>Quantity:</strong> {{ $products->quantity ?? '' }}</p>
            <p><strong>Total Amount:</strong> ₹{{ $products->total_amount ?? '' }}</p>
        </div>
    </div>
</body>
</html>
