<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\Validator;

class UnitAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        # default responses
        $responses = [];
        $responses['message'] = "Data get successfully!";
        $responses['status'] = true;
        $responses['code'] = 200;

        #paginate
        $show = $request->show;
        $search = $request->search;
        $order_by = $request->order_by;
        $order_type = $request->order_type;

        $units = Unit::when($search, function ($query, $search) {
            $query->where('name', 'like', "%".$search."%");
        })->orderBy($order_by, $order_type)->paginate($show);
        $responses['data'] = $units;

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
        # default responses
        $responses = [];
        $responses['message'] = "Bad request!";
        $responses['status'] = false;
        $responses['code'] = 400;

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:units|max:100'
        ]);

        if ($validator->fails()) {
            $responses['errors'] = $validator->errors();
            return response()->json($responses, 200);
        }

        $unit = new Unit;
        $unit->name = $request->name;
        $unit->save();

        if($unit) {
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
        # default responses
        $responses = [];
        $responses['message'] = "Bad request!";
        $responses['status'] = false;
        $responses['code'] = 400;

        if($id != null && $id != '') {
            $unit = Unit::where('id', $id)->first();
            $responses['code'] = 200;
            if($unit != null) {
                $responses['message'] = "Data get successfully!";
                $responses['data'] = $unit;
                $responses['status'] = true;
            } else {
                $responses['message'] = "Data not found!";
                $responses['status'] = false;
            }
            return response()->json($responses, 200);
        } else {
            return response()->json($responses, 200);
        }
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
        # default responses
        $responses = [];
        $responses['message'] = "Bad request!";
        $responses['status'] = false;
        $responses['code'] = 400;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'id' => 'required'
        ]);
        // dd($validator);
        if ($validator->fails()) {
            $responses['errors'] = $validator->errors();
            return response()->json($responses, 200);
        }

        $unit = Unit::find($request->id);
        $unit->name = $request->name;
        $unit->save();
        // dd($unit);
        if($unit) {
            $responses['message'] = "Data updated successfully!";
            $responses['status'] = true;
            $responses['code'] = 200;
            return response()->json($responses, 200);
        } else {
            return response()->json($responses, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        # default responses
        $responses = [];
        $responses['message'] = "Bad request!";
        $responses['status'] = false;
        $responses['code'] = 400;

        if($id != null && $id != '') {

            $unit = Unit::find($id);
            $unit->delete();

            if($unit) {
                $responses['message'] = "Data deleted successfully!";
                $responses['status'] = true;
                $responses['code'] = 200;
                return response()->json($responses, 200);
            } else {
                $responses['message'] = "Data not found!";
                $responses['status'] = false;
                $responses['code'] = 200;
                return response()->json($responses, 200);
            }
            return response()->json($responses, 200);
        } else {
            return response()->json($responses, 200);
        }
    }
}
