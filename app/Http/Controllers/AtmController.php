<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $atm = DB::table('atm')->join('bank', 'atm.id_bank', '=', 'bank.id')->where('status', '=', '1')->get();
        $bank = DB::table('bank')->get();
        foreach ($bank as $bank){
            $banker[] = [ 'id' => $bank->id, 'value' => $bank->nama ];
        }
        //return view('search', ['atms' => $atm, 'banks' => $banker]);
        return view('search', ['atms' => $atm]);
    }

    public function autocomplete(){
        // $q = Request::input('q');
        // $query = '%'.$q.'%';

        // $bank = App\Bank::where('nama','like',$query)->get();
        // $results = array();
        // foreach ($bank as $bank){
        //     array_push($results, [ 'id' => $bank->id, 'value' => $bank->nama ]);
        // }
//        return Response::json($results);
        return "Halo, shuf";
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
