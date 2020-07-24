<?php

namespace App\Http\Controllers;

use App\Product;
use App\category;
use App\RequestOrder;
use App\RequestOrderItems;
use App\OrderAddress;
use Auth;
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

    public function placeOrder(Request $request)
    {
        $data = $request->all();

        $lastOrder = RequestOrder::orderBy('id', 'desc')->first();
        if ( ! $lastOrder )
        {
            $number = 0;
        }
        else 
        {
            $number = substr($lastOrder->referanceid, 3);
        }
        $prefix = 'ORD' . sprintf('%06d', intval($number) + 1);

        $orderId = sprintf('%06d', intval($number) + 1);
        $refId = $prefix;

        $total = 0;

        // $oldCart = Session::get('cart'); 
        // $cart = new Cart($oldCart);

        foreach ($request->session('cart') as $id => $details ) 
        {
        
            $total += $details['quantity'] * $details['price'];

            $item = new RequestOrderItems();
            $item->order_id = $orderId;
            $item->request_product_name = $details['name'];
            $item->request_product_price = $details['price'];
            $item->request_product_qty = $details['quantity'];
            $item->save();

        }

        $order = new RequestOrder();
        $order->referanceid = $refId;
        $order->order_id = $orderId;
        $order->buyer_name = Auth::user()->name;
        $order->buyer_images = "user.jpg";
        $order->pro_name = "test";
        $order->pro_price = "none";
        $order->total_price = $total;
        $order->payment_status = "cod";
        $order->order_status = "order placed";
        $order->save();



        $address = new OrderAddress();
        $address->order_id = $orderId;
        $address->user_id = Auth::id();
        $address->first_name = $data['first_name'];
        $address->last_name = $data['last_name'];
        $address->mobile = $data['mobile'];
        $address->email = $data['email'];
        $address->zone = $data['zone'];
        $address->house = $data['house'];
        $address->street = $data['street'];
        $address->city = $data['city'];
        $address->state = $data['state'];
        $address->country = $data['Country'];
        $address->save();

        $request->session()->forget('cart');

        return redirect('order/success/'.$refId);
        

    }

    public function orderSuccess($id)
    {
        $orderId = $id;
        $data = category::latest()->paginate(50);
        return view('orderSuccess', compact('data', 'orderId'));
    }
}
