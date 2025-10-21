<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products') }}
            </h2>
            
        </x-slot>
 
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a class="btn btn-secondary"href="{{route('productdetails')}}">Back</a>
                  <a class="btn btn-secondary"href="{{route('productdetail.export',$products->id)}}">excel</a>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold mb-4">{{ $products->products->name ??''}}</h3>
                    <p><strong>Name:</strong> {{ @$products->products->name??'' }}</p>
                    <p><strong>Price:</strong> ₹{{ $products->products->value??'' }}</p>
                    <p><strong>Quantity:</strong> {{ $products->quantity??'' }}</p>
                    <p><strong>Total Amount:</strong> {{ $products->total_amount??'' }}</p>

                
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>