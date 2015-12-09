<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
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

     public function near() 
     {
        
        $Longi = $_GET['long'];
        $Lati = $_GET['lat'];        
        $atmnear = DB::table('atm')->select('*',DB::raw('(6371 * acos(cos(radians('.$Lati.'))*cos(radians(lat))*cos(radians(lng)-radians('.$Longi.'))+sin(radians('.$Lati.'))*sin(radians(lat)))) as distance'))->join('bank', 'atm.id_bank', '=', 'bank.id')->where('status', '=', '1')->orderBy('distance')->having('distance', '<', 5)->get();
        return $atmnear;
       
    }

    public function getAtmNameAndLocation($str) {
            $strlen = strlen($str);
            $index = 0;
            for($i = 0; $i < $strlen; $i++) {
                $char = substr($str, $i, 1);
                if(strcmp($char,",") == 0) {
                    $index += $i;
                    break;
                }
            }
            $result = Array('name'=>substr($str, 0, $index), 'location'=>substr($str, $index+2));
            return $result;
    }

    public function searchResult(Request $request) {
        $location = $request->input('location');
        $bank = $request->input('bank');
        
        $data = SearchController::getAtmNameAndLocation($location);

        $atmName = $data['name'];
        $loc = $data['location'];

        $result = Array();
        
        $activeAtms = DB::table('atm')->join('bank', 'atm.id_bank', '=', 'bank.id')->where('status', '=', '1')->get();

        foreach ($activeAtms as $activeAtm) {
            $isTrueAtm = strcmp($activeAtm->nama_atm, $atmName) == 0;
            $isTrueBank = strcmp($activeAtm->nama, $bank) == 0;
            if($isTrueAtm && $isTrueBank) {
                array_push($result, ['unique'=>$activeAtm]);
                return json_encode($result);
            }

        }

        $isLocationNull = strcmp($location, "") == 0;
        $isBankNull = strcmp($bank, "") == 0;
        if(!$isLocationNull && !$isBankNull) return json_encode(["message"=>"No Match Found"]);

        foreach ($activeAtms as $activeAtm) {
            if(strcmp($activeAtm->nama_atm, $atmName) == 0) {
                array_push($result, ["location"=>$activeAtm]);
            }

            if(strcmp($activeAtm->nama, $bank) == 0) {
                array_push($result, ["bank"=>$activeAtm]);
            }
        }

        return json_encode($result);
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
