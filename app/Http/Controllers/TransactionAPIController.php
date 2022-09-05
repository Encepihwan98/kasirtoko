<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Validator;
use PDF;

class TransactionAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $responses = [];
        $responses['message'] = "Data get successfully!";
        $responses['status'] = true;
        $responses['code'] = 200;

        #paginate
        $show = $request->show;
        $search = $request->search;
        $order_by = $request->order_by;
        $order_type = $request->order_type;

        $data = Transaction::when($search, function ($query, $search) {
            $query->where('name', 'like', "%".$search."%");
        })->with('transaction_detail','transaction_detail.product','transaction_detail.product.unit')->orderBy($order_by, $order_type)->paginate($show);
        $responses['data'] = $data;

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
        // dd(json_decode($request->product));
        # default responses
        $responses = [];
        $responses['message'] = "Bad request!";
        $responses['status'] = false;
        $responses['code'] = 400;

        $validator = Validator::make($request->all(), [
            'nota' => 'required|unique:transactions|max:20',
            'products' => 'required'
        ]);

        if ($validator->fails()) {
            $responses['errors'] = $validator->errors();
            return response()->json($responses, 200);
        }

        $store = new Transaction;
        $store->user_id = '1';
        $store->nota = $request->nota;
        $store->status = 1;
        $store->save();

        if($store) {
            $product = json_decode($request->products);
            if(count($product) > 0) {
                foreach ($product as $key => $value) {
                    $store_detail = new TransactionDetail;
                    $store_detail->transaction_id = $store->id;
                    $store_detail->product_id = $value->id;
                    $store_detail->qty = $value->qty;
                    $store_detail->save();
                }
            }

            $responses['message'] = "Data stored successfully!";
            $responses['status'] = true;
            $responses['code'] = 200;
            return response()->json($responses, 200);
        } else {
            return response()->json($responses, 200);
        }
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

    public function getPDF(Request $request)
    {
        // dd($request);
        if($request->type == 'nota') {
            if(isset($request->id)) {
                $data = Transaction::with('transaction_detail','transaction_detail.product','transaction_detail.product.unit')->where('id', $request->id)->first();
            } else {
                // retreive all records from db
                $data = Transaction::with('transaction_detail','transaction_detail.product','transaction_detail.product.unit')->latest()->first();
            }
            $customPaper = array(0,0,225,500);
            // share data to view
            $pdf = PDF::loadView('transaksi.nota-pdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif'])->setPaper($customPaper);
            // download PDF file with download method
            return $pdf->stream();
            // return view('transaksi.nota-pdf');
        } else {

        }
    }
}
