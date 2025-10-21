<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index()
    {
        $products=Product::all();
        // dd($products);
        return view('product',compact('products'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
        'name' => 'required|max:50',
        'value' => 'required',
    ]);
    Product::create([
        'name' => $request->name,
        'value' =>$request->value,
    ]);
    return redirect('/product')->with("added");
    }
    public function create()
    {
        return view('productcreate');
    }
    public function edit($id)
    {
         $product=Product::findorfail($id);
         return view('productedit',compact('product'));
    }
     public function destroy($id)
    {
        $product=Product::findorfail($id);
        $product->delete();
        return redirect()->back()->with("deleted");
    }
    public function update(Request $request,$id):RedirectResponse
    {
        $request->validate([
        'name' => 'required|max:50',
        'value' => 'required',
    ]);
     $product=Product::findorfail($id);
    $product->update([
        'name' => $request->name,
        'value' =>$request->value,
    ]);
   return redirect('/')->with('success', 'Updated successfully!');

    }
}
