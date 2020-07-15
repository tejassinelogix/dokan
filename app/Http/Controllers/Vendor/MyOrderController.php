<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\RequestOrder;
use App\Product;
use Illuminate\Http\Request;
use DB;

class MyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RequestOrder::latest()->paginate(10);
        return view('vendor/my_order_list', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestOrder  $requestOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $RequestOrder = RequestOrder::find($id);
         $data = Product::where('id',$RequestOrder->order_id)->get();
        return view('vendor/my_order_details', compact('RequestOrder','data'));
    }

    public function readytopickup(Request $request)
    {
        $ids = $request->ids;
        $RequestOrder = RequestOrder::find($ids);
        $RequestOrder->order_status =  'ready to pickup';
        $RequestOrder->payment_status =  'paid';

        $RequestOrder->save(); 
        return response()->json(['success'=>""]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestOrder  $requestOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestOrder $requestOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestOrder  $requestOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestOrder $requestOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestOrder  $requestOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestOrder $requestOrder)
    {
        //
    }
}
