<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Vendor;
use Auth;

class VendorRegistor extends Controller
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

        function checklogin(Request $request)
        {
             $this->validate($request, [
              'email'   => 'required|email',
              'password'  => 'required|alphaNum|min:3'
             ]);
             
            $model = Vendor::where('email', $request->email)->first();
            //echo "<pre>";print_r($model->vendor_status);die;
            if (Hash::check($request->password, $model->password, [])) {
                if($model->vendor_status=='1')
                {
                    return redirect('vendor/dashboard');
                }
                else
                {
                    return redirect('vendor/login')->with('error', 'Your account is not verified.');
                }
            }
            else
            {
                return redirect('vendor/login')->with('error', 'Wrong Login Details');
            }

        }


    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'vendor_image' => 'required',
        ]);
        // echo $request;die;
        $image = $request->file('vendor_image');
        
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('vendor_profile'), $new_name);

          $form_data = array(
            'name'          =>   $request->name,
            'email'         =>   $request->email,
            'password'      =>   Hash::make($request->password),
            'vendor_image'  =>   $new_name,
            'vendor_status'  =>   '0',
        );

          Vendor::create($form_data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
