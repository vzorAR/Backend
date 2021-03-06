<?php

namespace App\Http\Controllers;

use App\Models\Scan;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Scan $scan)
    {
        return $scan->all();
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
            'customer_id' => $request->input('customer_id'),
            'end_user_id' => $request->input('end_user_id'),
            'scan_date' => $request->input('scan_date'),
            'device' => $request->input('device'),
            'ip' => $request->input('ip'),
        ];

        Scan::create($data_to_insert);

        return [
            'hasError' => false,
            'message' => 'Created'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function show(Scan $scan)
    {
        return $scan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function edit(Scan $scan)
    {
        return $scan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scan $scan)
    {
        $data_to_update = [
            'customer_id' => $request->input('customer_id'),
            'end_user_id' => $request->input('end_user_id'),
            'scan_date' => $request->input('scan_date'),
            'device' => $request->input('device'),
            'ip' => $request->input('ip'),
        ];

        $scan->update($data_to_update);

        return [
            'hasError' => false,
            'message' => 'Updated'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scan  $scan
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        Scan::whereIn('id', explode(',', $ids))->delete();

        return [
            'hasError' => false,
            'message' => 'Deleted'
        ];
    }
}
