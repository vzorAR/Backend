<?php

namespace App\Http\Controllers;

use App\Models\EndUser;
use Illuminate\Http\Request;

class EndUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EndUser $endUser)
    {
        return $endUser->all();
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
        $data_to_insert = [
            'name' => $request->input('name'),
            'sex' => $request->input('sex'),
            'age' => $request->input('age'),
            'phone' => $request->input('phone'),
            'city_id' => $request->input('city_id'),
        ];

        EndUser::create($data_to_insert);

        return [
            'hasError' => false,
            'message' => 'Created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EndUser  $endUser
     * @return \Illuminate\Http\Response
     */
    public function show(EndUser $endUser)
    {
        return $endUser;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EndUser  $endUser
     * @return \Illuminate\Http\Response
     */
    public function edit(EndUser $endUser)
    {
        return $endUser;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EndUser  $endUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EndUser $endUser)
    {
        $data_to_update = [
            'name' => $request->input('name'),
            'sex' => $request->input('sex'),
            'age' => $request->input('age'),
            'phone' => $request->input('phone'),
            'city_id' => $request->input('city_id'),
        ];

        $endUser->update($data_to_update);

        return [
            'hasError' => false,
            'message' => 'Updated'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EndUser  $endUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        EndUser::whereIn('id', explode(',', $ids))->delete();

        return [
            'hasError' => false,
            'message' => 'Deleted'
        ];
    }
}
