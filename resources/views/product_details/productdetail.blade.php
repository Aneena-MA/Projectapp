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
    <br>
  <a class="btn btn-secondary"href="{{route('productdetail.create')}}">+add</a>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Value</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Amount</th>
     
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
    
      @foreach($products as $product)
      <th scope="row">1</th>
      <td>{{$product->products->name}}</td>
      <td>{{$product->products->value}}</td>
      <td>{{$product->quantity}}</td>
      <td>{{$product->total_amount}}</td>
     <td><a class="btn btn-secondary"href="{{route('productdetail.edit',$product->id)}}">Edit</a>
     <a class="btn btn-secondary"data-bs-toggle="modal" data-bs-target="#productdetaildelete"
        onclick="setDeleteUrl('{{route('productdetail.delete',$product->id)}}')">delete</a>
      <a class="btn btn-secondary"href="{{route('productdetail.show',$product->id)}}">View</a></td>
    </tr>
     @endforeach
  </tbody>
</table>
   <div class="modal" tabindex="-1" role="dialog"id="productdetaildelete">
  <div class="modal-dialog" role="document">
    <form id="deleteForm" method="post">
      @csrf
      @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure?</p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Delete</button>
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
</form>
  </div>
</div>
</x-app-layout>

</body>
</html>
<script>
      function setDeleteUrl(url) {
            document.getElementById('deleteForm').action = url;
        }
</script>


