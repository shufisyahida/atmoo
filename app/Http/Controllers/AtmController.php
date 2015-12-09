<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atm;
use App\Info;
use DB;
use Validator;

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

    public function admin(){
        return view('admin', ['atm' => DB::table('atm')->join('bank', 'atm.id_bank', '=', 'bank.id')->get(),
                'atmv' => DB::table('atm')->join('bank', 'atm.id_bank', '=', 'bank.id')->where('atm.status', '=', '0')->get()
            ]);
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
        $input = $request->all();
        
        $rules = [
            'nama' => 'required',
            'bank' => 'required',
            'loc' => 'required',
            'lng' => 'required',
            'lat' => 'required',
            'nom' => 'integer',
        ];

        $messages = [
            'required' => 'This field must be filled',
            'integer' => 'This field should be number',
            'lat.required' => 'Please click map to get coordinates',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

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
        if($jenis == "1"){
            $info->jenis = "Setor Tunai";
        }else{
            $info->jenis = "Tarik Tunai";
            $info->nominal = $request->input('nom');
        }
        $info->save();
        return redirect()->back()->with('msg', 'Berhasil!');

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
        $atm = Atm::find($id);
        $atm->status = '1';
        $atm->save();
        return redirect()->back()->with('msg', 'Atm berhasil diverifikasi');
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
        $atm = Atm::find($id);
        $atm->delete();
        return redirect()->back()->with('msg', 'Atm berhasil dihapus');

    }
}
