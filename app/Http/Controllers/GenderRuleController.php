<?php

namespace App\Http\Controllers;

use App\GenderRule;
use Session;
use Illuminate\Http\Request;

class GenderRuleController extends Controller
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
        $item = new GenderRule;
        $item->description = $request["grule-name"];
        $item->save();
        Session::flash('success','Regra de aluguer criada com sucesso!');     
        return redirect()->back();            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GenderRule  $genderRule
     * @return \Illuminate\Http\Response
     */
    public function show(GenderRule $genderRule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GenderRule  $genderRule
     * @return \Illuminate\Http\Response
     */
    public function edit(GenderRule $genderRule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GenderRule  $genderRule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GenderRule $genderRule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GenderRule  $genderRule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GenderRule::find($id)->delete();
        Session::flash('success','Regra de aluguer removida com sucesso!');        
        return redirect()->back();
    }
}
