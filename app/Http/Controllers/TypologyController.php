<?php

namespace App\Http\Controllers;

use App\Typology;
use Session;
use Illuminate\Http\Request;

class TypologyController extends Controller
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
        $item = new Typology;
        $item->description = $request["typo-name"];
        $item->save();
        Session::flash('success','Tipologia criada com sucesso!');     
        return redirect()->back();     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Typology  $typology
     * @return \Illuminate\Http\Response
     */
    public function show(Typology $typology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Typology  $typology
     * @return \Illuminate\Http\Response
     */
    public function edit(Typology $typology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Typology  $typology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typology $typology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Typology  $typology
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Typology::find($id)->delete();
        Session::flash('success','Tipologia removida com sucesso!');        
        return redirect()->back();
    }
}
