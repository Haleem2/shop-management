<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShop;
use App\Http\Requests\UpdateShop;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shop::paginate(PAGINATE);

        return view('admin.shops.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShop $request)
    {
        $input = $request->except('_token');
        if ($request->hasFile('logo')) {
            $file_name = time() . '.' . $request->logo->extension();
            $request->file('logo')->storeAs('public/logos', $file_name);
            $input['logo'] = $file_name;
        }

        if (!Shop::create($input))
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
        $data = Shop::where('id',$id)->first()->customers()->paginate(PAGINATE);
        $shop_id=$id;
        return view('admin.customers.index',compact('data','shop_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        return view('admin.shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShop $request, Shop $shop)
    {
        $old_logo = Shop::getOldLogo($shop->id);
        $shop->logo = $old_logo;
        if ($request->hasFile('logo')) {
            $file_name = time() . '.' . $request->logo->extension();
            $request->file('logo')->storeAs('public/logos', $file_name);
            Storage::delete('public/logos/' . $old_logo);
            $shop->logo = $file_name;
        }
        $shop->name = $request->name;
        $shop->website = $request->website;
        $shop->email = $request->email;
        if (!$shop->save())
            return back()->with('Error', 'error occured please try again');
        return back()->with('success', 'data updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        $old_logo = Shop::getOldLogo($id);
        if ($shop->customers()->count())
            return back()->with('Error', 'shop related with data');
        Storage::delete('public/logos/' . $old_logo);
        if (!$shop->delete())
            return back()->with('Error', 'error occured please try again');
        return back()->with('success', 'data deleted successfuly');
    }
}
