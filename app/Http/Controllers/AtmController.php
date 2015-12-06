<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atm;
use App\Info;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AtmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atms = Atm::all();
        $results = array();
        foreach ($atms as $atm){
            array_push($results, $atm->nama_atm . ", " . $atm->alamat);
        }
        return $results;
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
        $bank = $request->input('bank');
        $sep = explode(" - ", $bank);
        $id = $sep[0];

        $atm = new Atm();
        $atm->id_bank = $id;
        $atm->nama_atm = $request->input('nama');
        $atm->alamat = $request->input('loc');
        $atm->lng = $request->input('lng');
        $atm->lat = $request->input('lat');
        $atm->status = '0';
        $atm->save();

        $lastAtm = Atm::orderBy('id', 'desc')->first();
        $idLastAtm = $lastAtm->id;

        $info = new Info();
        $info->id_atm = $idLastAtm;
        $jenis = $request->input('jenis');
        if($jenis == "0"){
            $info->jenis = "Setor Tunai";
        }else{
            $info->jenis = "Tarik Tunai";
            $info->nominal = $request->input('nom');
        }
        $info->save();

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
