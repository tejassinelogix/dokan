<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\RequestOrder;
use App\Product;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Crypt;

//use Haruncpi\LaravelIdGenerator\IdGenerator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Order::latest()->paginate(50);
        // return view('admin/orderlist', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
        $data = RequestOrder::latest()->paginate(10);
        return view('admin/orderlist', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $lastOrder = Order::orderBy('created_at', 'desc')->first();
        if ( ! $lastOrder )
        {
            $number = 0;
        }
        else 
        {
            $number = substr($lastOrder->referanceid, 3);
        }
        $prefix = 'ORD' . sprintf('%06d', intval($number) + 1);
        echo "<pre>";print_r($prefix);die;
    }


    public function complete(Request $request)
    {
        $ids = $request->ids;

        $product = RequestOrder::find($ids);

        $name = 'kamlesh';
        $email = 'kamlesh.mishra@sinelogix.com';
        //$email_encrypted = Crypt::encryptString($email);

        Mail::send('emails.admin.ordershipment-email', ['msg' => 'Hi kamlesh,Your order is ready to shipment.', 'email' => $email], function ($m) use ($name, $email) {
            $m->from('sine.logix.testing@gmail.com', 'Saving Square');
            $m->to($email, $name);
            $m->subject('Order Shipment');
        });
                
        if (Mail::failures()) {
            return redirect()->back()->with('error_message', "Mail sending fail please verify your email.");
        }

        $name1 = 'Alert Shipment';
        $email1 = 'mishrakamlesh784@gmail.com';
        //$email_encrypted = Crypt::encryptString($email);

        Mail::send('emails.admin.ordershipment-email', ['msg' => 'Hi Shipment,below is a details for order  shipment.', 'email' => $email1], function ($m) use ($name1, $email1) {
            $m->from('sine.logix.testing@gmail.com', 'Saving Square');
            $m->to($email1, $name1);
            $m->subject('Order Shipment');
        });
                
        if (Mail::failures()) {
            return redirect()->back()->with('error_message', "Mail sending fail please verify your email.");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $RequestOrder = RequestOrder::find($id);
        $data = Product::where('id',$RequestOrder->order_id)->get();
        return view('admin/view_order_details', compact('RequestOrder','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
