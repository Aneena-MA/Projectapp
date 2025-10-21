<?php

namespace App\Exports;

use App\Models\ProductDetail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductDetailExport implements FromCollection, WithHeadings
{
    protected $product;

    public function __construct(ProductDetail $product)
    {
        $this->product = $product;
    }

    public function collection()
    {
       
        return collect([
            [
                'Name'         => $this->product->products->name ?? '',
                'Price'        => $this->product->products->value ?? '',
                'Quantity'     => $this->product->quantity ?? '',
                'Total Amount' => $this->product->total_amount ?? '',
            ]
        ]);
    }

    public function headings(): array
    {
        return ['Name', 'Price', 'Quantity', 'Total Amount'];
    }
}
