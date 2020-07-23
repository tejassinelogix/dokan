<?php

namespace App\Http\Controllers;

use App\Product;
use App\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $Product = new Product();
        //  $data= $this->validate($request,[
        // 'product_name' => 'required|min:6',
        // 'product_price  ' => 'required',
        // 'product_qty    ' => 'required',
        // 'product_description  ' => 'required',
        // 'product_brand  ' => 'required'
        // ]); 
        //  echo "<pre>";print_r($data);die;
        //  echo "test";die;
        // $Product->saveProduct($data);
        //return redirect('Product');
        Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function viewCart()
    {
        $data = category::latest()->paginate(50);
        return view('cart', compact('data'));
        
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
 
        if(!$product) {
 
            abort(404);
 
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "id"=>$product->id,
                        "name" => $product->product_name,
                        "quantity" => 1,
                        "price" => $product->product_price,
                        "photo" => $product->featured_images,
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id"=>$product->id,
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_price,
            "photo" => $product->featured_images,
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
 
    public function removeCart($id)
    {
        if($id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$id])) {
 
                unset($cart[$id]);
 
                session()->put('cart', $cart);
            }
 
            return redirect()->back()->with('success', 'Product removed successfully');
        }
    }

    public function checkout()
    {
        $data = category::latest()->paginate(50);
        return view('cartCheckout', compact('data'));
    }
}
