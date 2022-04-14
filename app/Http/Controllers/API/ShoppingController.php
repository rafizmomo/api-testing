<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shopping::all();
        return response()
            ->json([
                'data' => $data
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'createddate' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $data = Shopping::create([
            'name' => $request->name,
            'createddate' => $request->createddate,
        ]);

        return response()
            ->json([
                'data' => [
                    'createddate' => $data->createddate,
                    'id' => $data->id,
                    'name' => $data->name,

                ]
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Shopping::findOrfail(id);
        return response()
            ->json([
                'data' => $data
            ]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'createddate' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $get_data = Shoping::findOrfail(id);
        $data = $get_data->update([
            'name' => $request->name,
            'createddate' => $request->createddate,
        ]);

        return response()
            ->json([
                'data' => [
                    'createddate' => $data->createddate,
                    'id' => $data->id,
                    'name' => $data->name,

                ]
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Shopping::findOrfail(id)->destroy();
        return response()
            ->json([
                'data' => 'data has been destroyed'
            ]);
    }
}
