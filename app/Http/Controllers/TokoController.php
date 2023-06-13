<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customers;

class TokoController extends Controller
{
    public function index(){
        return view('toko/index');
    }
    public function detail(){
        return view('toko/detail');
    
    }

    public function admin(){
        $products = Product::all();
        return view('toko/product/admin', compact('products'));
    }


    

    public function create(){
        return view('toko/product/create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',

        ]);
        Product::create($request->all());
        return redirect()->route('produk.admin')->with('success', 'Product created Successfully');
    }

    public function edit(Product $product){
        return view('toko/product/edit', compact('product'));
    }

    public function destroy(Product $product){
        //        dd($product);
        $product->delete();
        return redirect()->route('produk.admin')->with('success', 'Product deleted Successfully');
    }
    
    public function update(Request $request, Product $product){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',

        ]);
        $product->update($request->all());
        return redirect()->route('produk.admin')->with('success', 'Product updated Successfully');
    }

public function customers(){
        $customer  = Customers::all();
        return view('toko/customers/customers', compact("customer"));
    }


    public function createCustomers(){
        return view('toko/customers/create');
    }

    public function storeCustomers(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'no_hp' => 'required',

        ]);
          Customers::create($request->all());
          return redirect()->route('customers.admin')->with('success', 'Customers created Successfully');
    }
    
    public function editCustomers(Customers $customer){
        return view('toko/customers/edit', compact('customer'));
    }

    public function updateCustomers(Request $request, Customers $customer){
     
        $request->validate([
                        'name' => 'required',
                        'address' => 'required',
                        'no_hp' => 'required',
        ]);

        $customer->update($request->all());
        //        dd($Pelanggan);
        return redirect()->route('customers.admin')->with('success', 'Customers updated Successfully');

    }

    public function destroyCustomers(Customers $customer){
        $customer->delete();
        return redirect()->route('customers.admin')->with('success', 'Customers updated successfully');
    }
}
