<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ComissionManagement;
use App\RequestOrder;
use Illuminate\Http\Request;

class ComissionManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ComissionManagement::latest()->paginate(50);
        return view('admin/comissionlist', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = RequestOrder::all();
        return view('admin/add_comission', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = array(
            'order_id'           =>   $request->order_id,
            'comission_rate'     =>   $request->comission_rate
        );

        ComissionManagement::create($form_data);

        return redirect('admin/admin_comission')->with('success', 'Comission Added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComissionManagement  $comissionManagement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comission = ComissionManagement::find($id);
        $data = RequestOrder::all();
        return view('admin/update_comission', compact('comission','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComissionManagement  $comissionManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(ComissionManagement $comissionManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComissionManagement  $comissionManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comission = ComissionManagement::find($id);
        $comission->order_id =  $request->get('order_id');
        $comission->comission_rate =  $request->get('comission_rate');

        $comission->save();

        return redirect('admin/admin_comission')->with('success', 'Comission Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComissionManagement  $comissionManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComissionManagement $comissionManagement)
    {
        //
    }
}
