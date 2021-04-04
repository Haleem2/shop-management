<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
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
    public function create($shop_id)
    {
        return view('admin.customers.create', compact('shop_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomer $request, $shop_id)
    {
        $input = $request->except('_token');
        $input['shop_id'] = $shop_id;
        if (!Customer::create($input))
            return back()->with('Error', 'error occured please try again');
        return back()->with('success', 'data saved successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($shop_id, $id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customers.edit', compact('customer', 'shop_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomer $request, $shop_id, Customer $customer)
    {
        $input = $request->except('_token');
        if (!$customer->update($input))
            return back()->with('Error', 'error occured please try again');
        return back()->with('success', 'data updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($shop_id, $id)
    {
        $customer = Customer::findOrFail($id);
        if (!$customer->delete())
            return back()->with('Error', 'error occured please try again');
        return back()->with('success', 'data deleted successfuly');
    }
}
