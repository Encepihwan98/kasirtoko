<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductAPIController extends Controller
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

        $data = Product::when($search, function ($query, $search) {
            $query->where('name', 'like', "%".$search."%");
        })->with('unit', 'category')->orderBy($order_by, $order_type)->paginate($show);
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
        # default responses
        $responses = [];
        $responses['message'] = "Bad request!";
        $responses['status'] = false;
        $responses['code'] = 400;

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|max:100'
        ]);

        if ($validator->fails()) {
            $responses['errors'] = $validator->errors();
            return response()->json($responses, 200);
        }

        $filename = 'default.png';

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file-> move(public_path('public/upload/product/'), $filename);
        }

        $store = new Product;
        $store->name = $request->name;
        $store->price = $request->price;
        $store->image = $filename;
        $store->unit_id = $request->unit_id;
        $store->category_id = $request->category_id;
        $store->save();

        if($store) {
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
            $show = Product::where('id', $id)->first();
            $responses['code'] = 200;
            if($show != null) {
                $responses['message'] = "Data get successfully!";
                $responses['data'] = $show;
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
        // dd($request);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'id' => 'required'
        ]);
        if ($validator->fails()) {
            $responses['errors'] = $validator->errors();
            return response()->json($responses, 200);
        }

        $filename = 'default.png';

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file-> move(public_path('public/upload/product/'), $filename);
        }

        $update = Product::find($request->id);
        $update->name = $request->name;
        $update->price = $request->price;
        $update->image = $filename;
        $update->unit_id = $request->unit_id;
        $update->category_id = $request->category_id;
        $update->save();

        if($update) {
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

            $delete = Product::find($id);
            $delete->delete();

            if($delete) {
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
