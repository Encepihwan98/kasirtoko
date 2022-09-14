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
        // $omsetMonth = [];
        $omzet = 0;
        foreach ($data as $valeu) {
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzet += $value['price'] * $value['qty'];
            }
            // $valeu['products'] = json_decode($valeu['products'], true);
            // array_push($omsetMonth, json_decode($valeu['products'], true));
        }
        // $omzet = 0;
        // for ($v = 0; isset($omsetMonth[$v]) && $omsetMonth[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetMonth[$v][$s]) && $omsetMonth[$v][$s] != null; $s++) {
        //         // echo $omsetMonth[$v][$s]['price'],",";
        //         $omzet += $omsetMonth[$v][$s]['price'];
        //     }
        // }
        //omset hari ini
        $dataDay = Transaction::whereDate('transactions.created_at', date('Y-m-d'))->get();
        // dd($dataDay);
        // $omsetDay = [];
        $omzetDay = 0;
        foreach ($dataDay as $day) {
            $data_decode = json_decode($day['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetDay += $value['price'] * $value['qty'];
            }
            // array_push($omsetDay, json_decode($day['products'], true));
        }
        // dd($omzetDayTest);
        // $omzetDay = 0;
        // for ($v = 0; isset($omsetDay[$v]) && $omsetDay[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetDay[$v][$s]) && $omsetDay[$v][$s] != null; $s++) {
        //         // echo $omsetMonth[$v][$s]['price'],",";
        //         $omzetDay += $omsetDay[$v][$s]['price'];
        //     }
        // }
        //omset tahun ini
        $dataYear = Transaction::whereYear('transactions.created_at', date('Y'))->get();
        // $omsetYear = [];
        $omzetYear = 0;
        foreach ($dataYear as $year) {
            $data_decode = json_decode($year['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetYear += $value['price'] * $value['qty'];
            }
            // array_push($omsetYear, json_decode($year['products'], true));
        }
        // $omzetYear = 0;
        // for ($v = 0; isset($omsetYear[$v]) && $omsetYear[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetYear[$v][$s]) && $omsetYear[$v][$s] != null; $s++) {
        //         // echo $omsetMonth[$v][$s]['price'],",";
        //         $omzetYear += $omsetYear[$v][$s]['price'];
        //     }
        // }

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
        // $omsetJan = [];
        $omzetJan = 0;
        foreach ($data as $valeu) {
            // array_push($omsetJan, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetJan += $value['price'] * $value['qty'];
            }
        }
        // $omzetJan = 0;
        // for ($v = 0; isset($omsetJan[$v]) && $omsetJan[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetJan[$v][$s]) && $omsetJan[$v][$s] != null; $s++) {
        //         $omzetJan += $omsetJan[$v][$s]['price'];
        //     }
        // }

        $dataFeb = Transaction::whereMonth('transactions.created_at', date('2'))->get();
        // $omsetFeb = [];
        $omzetFeb = 0;
        foreach ($dataFeb as $valeu) {
            // array_push($omsetFeb, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetFeb += $value['price'] * $value['qty'];
            }
        }
        // dd($omsetFeb);
        // $omzetFeb = 0;
        // for ($v = 0; isset($omsetFeb[$v]) && $omsetFeb[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetFeb[$v][$s]) && $omsetFeb[$v][$s] != null; $s++) {
        //         $omzetFeb += $omsetFeb[$v][$s]['price'];
        //     }
        // }
        // dd($omzetFeb);
        $dataMart = Transaction::whereMonth('transactions.created_at', date('3'))->get();
        // $omsetMart = [];
        $omzetMart = 0;
        foreach ($dataMart as $valeu) {
            // array_push($omsetMart, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetMart += $value['price'] * $value['qty'];
            }
        }
        // $omzetMart = 0;
        // for ($v = 0; isset($omsetMart[$v]) && $omsetMart[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetMart[$v][$s]) && $omsetMart[$v][$s] != null; $s++) {
        //         $omzetMart += $omsetMart[$v][$s]['price'];
        //     }
        // }

        $dataApr = Transaction::whereMonth('transactions.created_at', date('4'))->get();
        // $omsetApr = [];
        $omzetApr = 0;
        foreach ($dataApr as $valeu) {
            // array_push($omsetApr, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetApr += $value['price'] * $value['qty'];
            }
        }
        // $omzetApr = 0;
        // for ($v = 0; isset($omsetApr[$v]) && $omsetApr[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetApr[$v][$s]) && $omsetApr[$v][$s] != null; $s++) {
        //         $omzetApr += $omsetApr[$v][$s]['price'];
        //     }
        // }

        $dataMei = Transaction::whereMonth('transactions.created_at', date('5'))->get();
        // $omsetMei = [];
        $omzetMei = 0;
        foreach ($dataMei as $valeu) {
            // array_push($omsetMei, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetMei += $value['price'] * $value['qty'];
            }
        }
        // $omzetMei = 0;
        // for ($v = 0; isset($omsetMei[$v]) && $omsetMei[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetMei[$v][$s]) && $omsetMei[$v][$s] != null; $s++) {
        //         $omzetMei += $omsetMei[$v][$s]['price'];
        //     }
        // }

        $dataJun = Transaction::whereMonth('transactions.created_at', date('6'))->get();
        // $omsetJun = [];
        $omzetJun = 0;
        foreach ($dataJun as $valeu) {
            // array_push($omsetJun, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetJun += $value['price'] * $value['qty'];
            }
        }
        // $omzetJun = 0;
        // for ($v = 0; isset($omsetJun[$v]) && $omsetJun[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetJun[$v][$s]) && $omsetJun[$v][$s] != null; $s++) {
        //         $omzetJun += $omsetJun[$v][$s]['price'];
        //     }
        // }

        $dataJul= Transaction::whereMonth('transactions.created_at', date('7'))->get();
        // $omsetJul = [];
        $omzetJul = 0;
        foreach ($dataJul as $valeu) {
            // array_push($omsetJul, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetJul += $value['price'] * $value['qty'];
            }
        }
        // $omzetJul = 0;
        // for ($v = 0; isset($omsetJul[$v]) && $omsetJul[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetJul[$v][$s]) && $omsetJul[$v][$s] != null; $s++) {
        //         $omzetJul += $omsetJul[$v][$s]['price'];
        //     }
        // }

        $dataAgs= Transaction::whereMonth('transactions.created_at', date('8'))->get();
        // $omsetAgs = [];
        $omzetAgs = 0;
        foreach ($dataAgs as $valeu) {
            // array_push($omsetAgs, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetAgs += $value['price'] * $value['qty'];
            }
        }
        // $omzetAgs = 0;
        // for ($v = 0; isset($omsetAgs[$v]) && $omsetAgs[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetAgs[$v][$s]) && $omsetAgs[$v][$s] != null; $s++) {
        //         $omzetAgs += $omsetAgs[$v][$s]['price'];
        //     }
        // }

        $dataSep = Transaction::whereMonth('transactions.created_at', date('9'))->get();
        // $omsetSep = [];
        $omzetSep = 0;
        foreach ($dataSep as $valeu) {
            // array_push($omsetSep, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetSep += $value['price'] * $value['qty'];
            }
        }
        // $omzetSep = 0;
        // for ($v = 0; isset($omsetSep[$v]) && $omsetSep[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetSep[$v][$s]) && $omsetSep[$v][$s] != null; $s++) {
        //         $omzetSep += $omsetSep[$v][$s]['price'];
        //     }
        // }

        $dataOkt = Transaction::whereMonth('transactions.created_at', date('10'))->get();
        // $omsetOkt = [];
        $omzetOkt = 0;
        foreach ($dataOkt as $valeu) {
            // array_push($omsetOkt, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetOkt += $value['price'] * $value['qty'];
            }
        }
        // $omzetOkt = 0;
        // for ($v = 0; isset($omsetOkt[$v]) && $omsetOkt[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetOkt[$v][$s]) && $omsetOkt[$v][$s] != null; $s++) {
        //         $omzetOkt += $omsetOkt[$v][$s]['price'];
        //     }
        // }

        $dataNbr = Transaction::whereMonth('transactions.created_at', date('11'))->get();
        // $omsetNbr = [];
        $omzetNov = 0;
        foreach ($dataNbr as $valeu) {
            // array_push($omsetNbr, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetNov += $value['price'] * $value['qty'];
            }
        }
        // $omzetNov = 0;
        // for ($v = 0; isset($omsetNbr[$v]) && $omsetNbr[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetNbr[$v][$s]) && $omsetNbr[$v][$s] != null; $s++) {
        //         $omzetNov += $omsetNbr[$v][$s]['price'];
        //     }
        // }

        $dataDsb = Transaction::whereMonth('transactions.created_at', date('12'))->get();
        // $omsetDsb = [];
        $omzetDsb = 0;
        foreach ($dataDsb as $valeu) {
            // array_push($omsetDsb, json_decode($valeu['products'], true));
            $data_decode = json_decode($valeu['products'], true);
            foreach ($data_decode as $key => $value) {
                // print_r($value);
                $omzetDsb += $value['price'] * $value['qty'];
            }
        }
        // $omzetDsb = 0;
        // for ($v = 0; isset($omsetDsb[$v]) && $omsetDsb[$v] != null; $v++) {
        //     for ($s = 0; isset($omsetDsb[$v][$s]) && $omsetDsb[$v][$s] != null; $s++) {
        //         $omzetDsb += $omsetDsb[$v][$s]['price'];
        //     }
        // }

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
