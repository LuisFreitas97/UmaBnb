<?php

namespace App\Http\Controllers;

use App\StuffingItem;
use Session;
use Illuminate\Http\Request;

class StuffingItemController extends Controller
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
        $item = new StuffingItem;
        $item->name = $request["sitem-name"];
        $item->save();
        Session::flash('success','Recheio criado com sucesso!');     
        return redirect()->back();                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StuffingItem  $stuffingItem
     * @return \Illuminate\Http\Response
     */
    public function show(StuffingItem $stuffingItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StuffingItem  $stuffingItem
     * @return \Illuminate\Http\Response
     */
    public function edit(StuffingItem $stuffingItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StuffingItem  $stuffingItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StuffingItem $stuffingItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StuffingItem  $stuffingItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        StuffingItem::find($id)->delete();
        Session::flash('success','Recheio removido com sucesso!');        
        return redirect()->back();
    }
}
