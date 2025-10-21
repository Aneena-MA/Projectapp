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
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Product name</label>
      <input type="text" class="form-control" id="validationDefault01"  name="name"placeholder="Product name" value="" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Value</label>
      <input type="number" class="form-control" id="validationDefault02" name="value" placeholder="Product Value" value="" required>
    </div>
   
  <button class="btn btn-primary" type="submit">Save</button>
</form>
</x-app-layout>
</body>
</html>