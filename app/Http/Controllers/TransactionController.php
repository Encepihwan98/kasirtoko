<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responses = [];
        $responses['message'] = "Data get successfully!";
        $responses['status'] = true;
        $responses['code'] = 200;
        //omset bulan ini
        $data = Transaction::whereMonth('transactions.created_at', date('m'))->get();
        $omsetMonth = [];
        foreach ($data as $valeu) {
            // $valeu['products'] = json_decode($valeu['products'], true);
            array_push($omsetMonth, json_decode($valeu['products'], true));
        }
        $omzet = 0;
        for ($v = 0; isset($omsetMonth[$v]) && $omsetMonth[$v] != null; $v++) {
            for ($s = 0; isset($omsetMonth[$v][$s]) && $omsetMonth[$v][$s] != null; $s++) {
                // echo $omsetMonth[$v][$s]['price'],",";
                $omzet += $omsetMonth[$v][$s]['price'];
            }
        }
        //omset hari ini
        $dataDay = Transaction::whereDate('transactions.created_at', date('Y-m-d'))->get();
        // dd($dataDay);
        $omsetDay = [];
        foreach ($dataDay as $day) {
            array_push($omsetDay, json_decode($day['products'], true));
        }
        // dd($omsetDay);
        $omzetDay = 0;
        for ($v = 0; isset($omsetDay[$v]) && $omsetDay[$v] != null; $v++) {
            for ($s = 0; isset($omsetDay[$v][$s]) && $omsetDay[$v][$s] != null; $s++) {
                // echo $omsetMonth[$v][$s]['price'],",";
                $omzetDay += $omsetDay[$v][$s]['price'];
            }
        }
        //omset tahun ini
        $dataYear = Transaction::whereYear('transactions.created_at', date('Y'))->get();
        $omsetYear = [];
        foreach ($dataYear as $year) {
            array_push($omsetYear, json_decode($year['products'], true));
        }
        $omzetYear = 0;
        for ($v = 0; isset($omsetYear[$v]) && $omsetYear[$v] != null; $v++) {
            for ($s = 0; isset($omsetYear[$v][$s]) && $omsetYear[$v][$s] != null; $s++) {
                // echo $omsetMonth[$v][$s]['price'],",";
                $omzetYear += $omsetYear[$v][$s]['price'];
            }
        }

        $responses['omsetDay'] = $omzetDay;
        $responses['omset'] = $omzet;
        $responses['omsetYear'] = $omzetYear;
        // $responses['omzet'] = $omzet;

        return response()->json($responses, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function omsetMonthPeriode()
    {
        $responses = [];
        $responses['message'] = "Data get successfully!";
        $responses['status'] = true;
        $responses['code'] = 200;
        //omset bulan ini
        $data = Transaction::whereMonth('transactions.created_at', date('1'))->get();
        $omsetPeriode = [];
        $omsetJan = [];
        foreach ($data as $valeu) {
            array_push($omsetJan, json_decode($valeu['products'], true));
        }
        $omzetJan = 0;
        for ($v = 0; isset($omsetJan[$v]) && $omsetJan[$v] != null; $v++) {
            for ($s = 0; isset($omsetJan[$v][$s]) && $omsetJan[$v][$s] != null; $s++) {
                $omzetJan += $omsetJan[$v][$s]['price'];
            }
        }

        $dataFeb = Transaction::whereMonth('transactions.created_at', date('2'))->get();
        $omsetFeb = [];
        foreach ($dataFeb as $valeu) {
            array_push($omsetFeb, json_decode($valeu['products'], true));
        }
        // dd($omsetFeb);
        $omzetFeb = 0;
        for ($v = 0; isset($omsetFeb[$v]) && $omsetFeb[$v] != null; $v++) {
            for ($s = 0; isset($omsetFeb[$v][$s]) && $omsetFeb[$v][$s] != null; $s++) {
                $omzetFeb += $omsetFeb[$v][$s]['price'];
            }
        }
        // dd($omzetFeb);
        $dataMart = Transaction::whereMonth('transactions.created_at', date('3'))->get();
        $omsetMart = [];
        foreach ($dataMart as $valeu) {
            array_push($omsetMart, json_decode($valeu['products'], true));
        }
        $omzetMart = 0;
        for ($v = 0; isset($omsetMart[$v]) && $omsetMart[$v] != null; $v++) {
            for ($s = 0; isset($omsetMart[$v][$s]) && $omsetMart[$v][$s] != null; $s++) {
                $omzetMart += $omsetMart[$v][$s]['price'];
            }
        }

        $dataApr = Transaction::whereMonth('transactions.created_at', date('4'))->get();
        $omsetApr = [];
        foreach ($dataApr as $valeu) {
            array_push($omsetApr, json_decode($valeu['products'], true));
        }
        $omzetApr = 0;
        for ($v = 0; isset($omsetApr[$v]) && $omsetApr[$v] != null; $v++) {
            for ($s = 0; isset($omsetApr[$v][$s]) && $omsetApr[$v][$s] != null; $s++) {
                $omzetApr += $omsetApr[$v][$s]['price'];
            }
        }

        $dataMei = Transaction::whereMonth('transactions.created_at', date('5'))->get();
        $omsetMei = [];
        foreach ($dataMei as $valeu) {
            array_push($omsetMei, json_decode($valeu['products'], true));
        }
        $omzetMei = 0;
        for ($v = 0; isset($omsetMei[$v]) && $omsetMei[$v] != null; $v++) {
            for ($s = 0; isset($omsetMei[$v][$s]) && $omsetMei[$v][$s] != null; $s++) {
                $omzetMei += $omsetMei[$v][$s]['price'];
            }
        }

        $dataJun = Transaction::whereMonth('transactions.created_at', date('6'))->get();
        $omsetJun = [];
        foreach ($dataJun as $valeu) {
            array_push($omsetJun, json_decode($valeu['products'], true));
        }
        $omzetJun = 0;
        for ($v = 0; isset($omsetJun[$v]) && $omsetJun[$v] != null; $v++) {
            for ($s = 0; isset($omsetJun[$v][$s]) && $omsetJun[$v][$s] != null; $s++) {
                $omzetJun += $omsetJun[$v][$s]['price'];
            }
        }

        $dataJul= Transaction::whereMonth('transactions.created_at', date('7'))->get();
        $omsetJul = [];
        foreach ($dataJul as $valeu) {
            array_push($omsetJul, json_decode($valeu['products'], true));
        }
        $omzetJul = 0;
        for ($v = 0; isset($omsetJul[$v]) && $omsetJul[$v] != null; $v++) {
            for ($s = 0; isset($omsetJul[$v][$s]) && $omsetJul[$v][$s] != null; $s++) {
                $omzetJul += $omsetJul[$v][$s]['price'];
            }
        }

        $dataAgs= Transaction::whereMonth('transactions.created_at', date('8'))->get();
        $omsetAgs = [];
        foreach ($dataAgs as $valeu) {
            array_push($omsetAgs, json_decode($valeu['products'], true));
        }
        $omzetAgs = 0;
        for ($v = 0; isset($omsetAgs[$v]) && $omsetAgs[$v] != null; $v++) {
            for ($s = 0; isset($omsetAgs[$v][$s]) && $omsetAgs[$v][$s] != null; $s++) {
                $omzetAgs += $omsetAgs[$v][$s]['price'];
            }
        }

        $dataSep = Transaction::whereMonth('transactions.created_at', date('9'))->get();
        $omsetSep = [];
        foreach ($dataSep as $valeu) {
            array_push($omsetSep, json_decode($valeu['products'], true));
        }
        $omzetSep = 0;
        for ($v = 0; isset($omsetSep[$v]) && $omsetSep[$v] != null; $v++) {
            for ($s = 0; isset($omsetSep[$v][$s]) && $omsetSep[$v][$s] != null; $s++) {
                $omzetSep += $omsetSep[$v][$s]['price'];
            }
        }

        $dataOkt = Transaction::whereMonth('transactions.created_at', date('10'))->get();
        $omsetOkt = [];
        foreach ($dataOkt as $valeu) {
            array_push($omsetOkt, json_decode($valeu['products'], true));
        }
        $omzetOkt = 0;
        for ($v = 0; isset($omsetOkt[$v]) && $omsetOkt[$v] != null; $v++) {
            for ($s = 0; isset($omsetOkt[$v][$s]) && $omsetOkt[$v][$s] != null; $s++) {
                $omzetOkt += $omsetOkt[$v][$s]['price'];
            }
        }

        $dataNbr = Transaction::whereMonth('transactions.created_at', date('11'))->get();
        $omsetNbr = [];
        foreach ($dataNbr as $valeu) {
            array_push($omsetNbr, json_decode($valeu['products'], true));
        }
        $omzetNov = 0;
        for ($v = 0; isset($omsetNbr[$v]) && $omsetNbr[$v] != null; $v++) {
            for ($s = 0; isset($omsetNbr[$v][$s]) && $omsetNbr[$v][$s] != null; $s++) {
                $omzetNov += $omsetNbr[$v][$s]['price'];
            }
        }

        $dataDsb = Transaction::whereMonth('transactions.created_at', date('12'))->get();
        $omsetDsb = [];
        foreach ($dataDsb as $valeu) {
            array_push($omsetDsb, json_decode($valeu['products'], true));
        }
        $omzetDsb = 0;
        for ($v = 0; isset($omsetDsb[$v]) && $omsetDsb[$v] != null; $v++) {
            for ($s = 0; isset($omsetDsb[$v][$s]) && $omsetDsb[$v][$s] != null; $s++) {
                $omzetDsb += $omsetDsb[$v][$s]['price'];
            }
        }

        array_push($omsetPeriode, $omzetJan, $omzetFeb, $omzetMart,$omzetApr,  $omzetMei, $omzetJun, $omzetJul, $omzetAgs, $omzetSep, $omzetOkt, $omzetNov, $omzetDsb);
        
        $responses['omset'] = $omsetPeriode;
        return response()->json($responses, 200);
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
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
