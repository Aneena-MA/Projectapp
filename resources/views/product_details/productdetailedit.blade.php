<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
   <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <form action="{{ route('productdetail.update',$productdetails->id) }}" method="POST">
        @csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
    <label for="product_name">Product Name</label>
    <select class="form-control" id="product_name" name="product_id" required>
        <option value="">Select a product</option>
        @foreach ($products as $product)
          <option value="{{ $product->id }}" data-value="{{ $product->value }}"
          {{ $productdetails->product_id == $product->id ? 'selected' : '' }}>
          {{ $product->name }}
        </option>
        @endforeach
    </select>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Value</label>
      <input type="number" class="form-control" id="product_value" name="value" placeholder="Product Value" value="{{$productdetails->value}}" readonly>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Quantity</label>
      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Product Value" value="{{$productdetails->quantity}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Total Amount</label>
      <input type="number" class="form-control" id="total_amount" name="total_amount" placeholder="Product Value" value="{{$productdetails->total_amount}}" required>
    </div>
</div>
  <button class="btn btn-primary" type="submit">Update</button>
</form>
</x-app-layout>
</body>
</html>
<script>
    const productSelect = document.getElementById('product_name');
    const valueInput = document.getElementById('product_value');
    const quantityInput = document.getElementById('quantity');
    const totalAmountInput = document.getElementById('total_amount');

    // Update value when product changes
    productSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const productValue = selectedOption.getAttribute('data-value') || 0;
        valueInput.value = productValue;
        calculateTotal(); // recalculate total
    });

    // Update total when quantity changes
    quantityInput.addEventListener('input', calculateTotal);

    function calculateTotal() {
        const value = parseFloat(valueInput.value) || 0;
        const quantity = parseFloat(quantityInput.value) || 0;
        totalAmountInput.value = (value * quantity).toFixed(2); // 2 decimal points
    }
    window.addEventListener('DOMContentLoaded', function() {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const productValue = selectedOption.getAttribute('data-value') || 0;
        valueInput.value = productValue;
        calculateTotal();
    });
</script>

