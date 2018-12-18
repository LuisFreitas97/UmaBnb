<?php

namespace App\Http\Controllers;

use App\AdvertisementType;
use Session;
use Illuminate\Http\Request;

class AdvertisementTypeController extends Controller
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
        $item = new AdvertisementType;
        $item->name = $request["type-name"];
        $item->save();
        Session::flash('success','Tipo de anúncio criado com sucesso!');     
        return redirect()->back();     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdvertisementType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show(AdvertisementType $userType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdvertisementType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvertisementType $userType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdvertisementType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertisementType $userType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdvertisementType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdvertisementType::find($id)->delete();
        Session::flash('success','Tipo de anúncio removido com sucesso!');        
        return redirect()->back();
    }
}
