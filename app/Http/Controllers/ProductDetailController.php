<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Exports\ProductDetailExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
class ProductDetailController extends Controller
{
    //
    public function index()
    {
        $products=ProductDetail::all();
        return view('product_details.productdetail',compact('products'));
    }
    public function create()
    {
         $products=Product::with('productdetails')->get();
          return view('product_details.productdetailcreate',compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'total_amount' => 'required',
        ]);
        // dd($request->product_file);
        if ($request->hasFile('product_file')) {
                $file = $request->file('product_file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/products', $filename, 'public'); // stores in storage/app/public/uploads/products
            }
            // dd($filePath);
        ProductDetail::create([
            'product_id' => $request->product_id,
            'quantity' =>$request->quantity,
            'total_amount' =>$request->total_amount,
            'product_file' => $filePath ?? null,
        ]);
        return redirect('/product-details')->with("added");
    
    }
    public function edit($id)
    {
        $productdetails=ProductDetail::findorfail($id);
        $products=Product::with('productdetails')->get();
        // dd($products);
        return view('product_details.productdetailedit',compact('productdetails','products'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
        'product_id' => 'required',
        'quantity' => 'required',
        'total_amount' => 'required',
    ]);
    $productdetail=ProductDetail::findorfail($id);
    $productdetail->update([
        'product_id' => $request->product_id,
        'quantity' =>$request->quantity,
        'total_amount' =>$request->total_amount,
    ]);
   return redirect('/product-details')->with('success', 'Updated successfully!');

    }
    public function delete($id)
    {
       $productdetail=ProductDetail::findorfail($id);
       $productdetail->delete($id);
    // dd($productdetail);
        return redirect('/product-details')->with('success','deleted successfully');
    }
    public function show($id)
    {
        $products=ProductDetail::findorfail($id);
        // dd($products);
        return view('product_details.productdetailshow',compact('products'));
    }
    public function exportExcel($id)
    {
      
        $product = ProductDetail::findOrFail($id);
        // dd($product);
        return Excel::download(new ProductDetailExport($product), 'product_'.$id.'.xlsx');
    }
    public function generatepdf($id)
    {
        $products = ProductDetail::with('products')->findOrFail($id);
        $pdf = Pdf::loadView('product_details.pdf', compact('products'));
        return $pdf->download('product_detail_'.$products->id.'.pdf');
    }
}
